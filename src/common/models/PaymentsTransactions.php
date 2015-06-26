<?php

namespace common\models;

use common\components\SystemAccountEmptyException;
use Yii;
use yii\base\ErrorException;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payments_transactions".
 *
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $sum
 * @property string $date_entered
 *
 * @property Accounts $from0
 * @property Accounts $to0
 */
class PaymentsTransactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['from', 'to'], 'integer'],
            [['sum'], 'number'],
            [['date_entered'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID-платежа',
            'from' => 'Номер счета отправителя',
            'to' => 'Номер счета получателя',
            'sum' => 'Сумма',
            'date_entered' => 'Дата',
        ];
    }

    /**
     * @return array
     */
    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'date_entered',
                ],
                'value' => function (){
                    return time(); // unix timestamp
                },
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromEntity()
    {
        return $this->hasOne(Accounts::className(), ['number' => 'from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToEntity()
    {
        return $this->hasOne(Accounts::className(), ['number' => 'to']);
    }

    public function save($runValidation = true, $attributeNames = null) {

        $fromEntity = Accounts::findOne(['is_system' => true]);
        $this->from = $fromEntity->number;

        $toEntity = Accounts::findOne(['number' => $this->to]);

        if ($fromEntity->balance < $this->sum) {
            throw new SystemAccountEmptyException('Недостаточно средств на системном счете');
        }

        $fromEntity->balance -= $this->sum;
        $toEntity->balance += $this->sum;

        $transaction = Yii::$app->db->beginTransaction();

        if ($fromEntity->save() && $toEntity->save() && parent::save($runValidation, $attributeNames)) {
            $transaction->commit();
                return true;
        } else {
            $transaction->rollBack();
        }
        return false;
    }
}
