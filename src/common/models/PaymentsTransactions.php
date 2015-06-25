<?php

namespace common\models;

use Yii;

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
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'sum' => 'Sum',
            'date_entered' => 'Date Entered',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom0()
    {
        return $this->hasOne(Accounts::className(), ['number' => 'from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo0()
    {
        return $this->hasOne(Accounts::className(), ['number' => 'to']);
    }
}
