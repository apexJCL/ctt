<?php

use yii\db\Migration;

class m160916_145510_remove_user_type_table extends Migration
{
    public function up()
    {
        $this->dropColumn('user', 'user_type_id');
        $this->dropColumn('user', 'role_id');
        $this->dropColumn('user', 'status_type_id');
        $this->dropTable('user_type');
        $this->dropTable('role');
        $this->dropTable('status');
    }

    public function down()
    {
        echo "m160916_145510_remove_user_type_table cannot be reverted.\n";
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
