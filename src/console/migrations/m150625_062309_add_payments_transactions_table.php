<?php

use yii\db\Schema;
use yii\db\Migration;

class m150625_062309_add_payments_transactions_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%payments_transactions}}', [
            'id' => Schema::TYPE_PK,
            'from' => Schema::TYPE_INTEGER . ' NOT NULL',
            'to' => Schema::TYPE_INTEGER . ' NOT NULL',
            'sum' => Schema::TYPE_MONEY,
            'date_entered' => Schema::TYPE_INTEGER,

        ]);

        $this->addForeignKey('payments_transactions_accounts_fk1', '{{%payments_transactions}}', 'from', '{{%accounts}}', 'number');
        $this->addForeignKey('payments_transactions_accounts_fk2', '{{%payments_transactions}}', 'to', '{{%accounts}}', 'number');
    }

    public function down()
    {
        $this->dropTable('{{%payments_transactions}}');

        return true;
    }
}
