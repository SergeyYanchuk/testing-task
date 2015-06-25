<?php

use yii\db\Schema;
use yii\db\Migration;

class m150625_071052_fill_accounts extends Migration
{
    const ACCOUNTS_COUNT = 50000;
    public function up()
    {
        $this->_createSystemAccount();

        for ($i = 0; $i < self::ACCOUNTS_COUNT; $i++) {
            $this->insert('{{%accounts}}', ['balance' => 0]);
        }

    }

    public function down()
    {
        echo "m150625_071052_default cannot be reverted.\n";

        return false;
    }

    protected function _createSystemAccount() {
        $this->insert('{{%accounts}}', ['balance' => Yii::$app->params['initialSystemBalance'], 'is_system' => true]);
    }

}
