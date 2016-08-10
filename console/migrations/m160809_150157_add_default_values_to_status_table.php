<?php

use yii\db\Migration;

class m160809_150157_add_default_values_to_status_table extends Migration
{
    public function up()
    {
        $this->insert('status', [
            'id' => 10,
            'name' => 'Active'
        ]);
        $this->insert('status', [
            'id' => 5,
            'name' => 'Pending'
        ]);
    }

    public function down()
    {
        echo "m160809_150157_add_default_values_to_status_table cannot be reverted.\n";

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
