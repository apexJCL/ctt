<?php

use yii\db\Migration;

class m160807_131912_replace_role_status_cols_in_user_table extends Migration
{
    public function up()
    {
        $this->dropColumn('user', 'status');
        $this->addColumn('user', 'role_id', 'SMALLINT(6) DEFAULT "10"');
        $this->addColumn('user', 'status_id', 'SMALLINT(6) DEFAULT "10"');
        $this->addColumn('user', 'user_type_id', 'SMALLINT(6) DEFAULT "10"');
    }

    public function down()
    {
        echo "m160807_131912_replace_role_status_cols_in_user_table cannot be reverted.\n";
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
