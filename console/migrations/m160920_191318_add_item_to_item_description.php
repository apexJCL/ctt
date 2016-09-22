<?php

use yii\db\Migration;

class m160920_191318_add_item_to_item_description extends Migration
{
    public function up()
    {
        $this->addColumn('item_description', 'item_id', 'int');
        $this->addForeignKey('item_itemdesc_FK', 'item_description', 'item_id', 'item', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('item_itemdesc_FK', 'item_description');
        $this->dropColumn('item_description', 'item_id');
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
