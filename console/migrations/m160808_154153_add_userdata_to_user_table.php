<?php

use yii\db\Migration;

class m160808_154153_add_userdata_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'nombre', 'VARCHAR(50) NOT NULL');
        $this->addColumn('user', 'apellido_paterno', 'VARCHAR(50) NOT NULL');
        $this->addColumn('user', 'apellido_materno', 'VARCHAR(50)');
    }

    public function down()
    {
        echo "m160808_154153_add_userdata_to_user_table cannot be reverted.\n";

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
