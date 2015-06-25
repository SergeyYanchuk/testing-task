<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property integer $number
 * @property string $balance
 * @property boolean $is_system
 *
 * @property PaymentsTransactions[] $paymentsTransactions
 * @property PaymentsTransactions[] $paymentsTransactions0
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['balance'], 'number'],
            [['is_system'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'number' => 'Number',
            'balance' => 'Balance',
            'is_system' => 'Is System',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentsTransactions()
    {
        return $this->hasMany(PaymentsTransactions::className(), ['from' => 'number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentsTransactions0()
    {
        return $this->hasMany(PaymentsTransactions::className(), ['to' => 'number']);
    }
}
