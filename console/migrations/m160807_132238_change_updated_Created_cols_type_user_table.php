<?php

use yii\db\Migration;

class m160807_132238_change_updated_Created_cols_type_user_table extends Migration
{
    public function up()
    {
        $this->alterColumn('user','updated_at', 'datetime');
        $this->alterColumn('user','created_at', 'datetime');
    }

    public function down()
    {
        $this->alterColumn('user','updated_at', 'int');
        $this->alterColumn('user','created_at', 'int');
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
