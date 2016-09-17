<?php

use yii\db\Migration;

class m160917_005743_add_columns_to_item_table extends Migration
{
    public function up()
    {
        $this->addColumn('item', 'brand_id', 'int');
        $this->addColumn('item', 'model', 'varchar(100)');
        $this->addForeignKey('brand_item_fk', 'item', 'brand_id', 'brand', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('brand_item_fk', 'item');
        $this->dropColumn('item', 'brand_id');
        $this->dropColumn('item', 'model');
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
