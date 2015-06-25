<?php

use yii\db\Schema;
use yii\db\Migration;

class m150625_062146_add_accounts_table extends Migration
{
    public function up()
    {

        $this->createTable('{{%accounts}}', [
            'number' => Schema::TYPE_PK,
            'balance' => Schema::TYPE_MONEY . ' DEFAULT 0',
            'is_system' => Schema::TYPE_BOOLEAN . ' DEFAULT false',

        ]);
    }

    public function down()
    {
        $this->dropTable('{{%accounts}}');

        return true;
    }

}
