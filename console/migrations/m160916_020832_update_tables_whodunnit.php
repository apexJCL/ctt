<?php

use yii\db\Migration;

class m160916_020832_update_tables_whodunnit extends Migration
{
    public function up()
    {
        $this->addColumn('client', 'created_at', 'datetime');
        $this->addColumn('client', 'updated_at', 'datetime');
        $this->addColumn('client', 'created_by', 'int');
        $this->addColumn('client', 'updated_by', 'int');
        $this->addForeignKey('client_who_created_fk', 'client', 'created_by', 'user', 'id');
        $this->addForeignKey('client_who_updated_fk', 'client', 'updated_by', 'user', 'id');
    }

    public function down()
    {
        return true;
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
