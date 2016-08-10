<?php

use yii\db\Migration;

class m160809_152054_add_usertype_default_value extends Migration
{
    public function up()
    {
        $this->insert('user_type', [
            'id' => 10,
            'name' => 'Normal'
        ]);
        $this->insert('user_type', [
            'id' => 20,
            'name' => 'Admin'
        ]);
    }

    public function down()
    {
        echo "m160809_152054_add_usertype_default_value cannot be reverted.\n";

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
