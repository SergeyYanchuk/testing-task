<?php

use yii\db\Schema;
use yii\db\Migration;

class m150625_075909_add_admin_account extends Migration
{
    public function up()
    {
        $this->insert('{{%user}}',
            [
                'username' => 'admin',
                'email' => 'admin@admin.ru',
                'password_hash' => '$2y$13$LOrKIMyxYHi1KLrYIMC3XeL7MlYVh0.1MFm3KhgulcQdJq1yYZ4ZW',
                'auth_key' => ' ',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
    }

    public function down()
    {
        echo "m150625_075909_add_admin_account cannot be reverted.\n";

        return false;
    }

}
