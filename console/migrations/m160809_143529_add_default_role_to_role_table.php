<?php

use yii\db\Migration;

class m160809_143529_add_default_role_to_role_table extends Migration
{
    public function up()
    {
        $this->insert('role', [
            'id' => 20,
            'name' => 'Admin'
        ]);
        $this->insert('role', [
            'id' => 10,
            'name' => 'User'
        ]);
    }

    public function down()
    {
        echo "m160809_143529_add_default_role_to_role_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
