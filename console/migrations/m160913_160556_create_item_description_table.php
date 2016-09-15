<?php

use console\models\Defaults;
use yii\db\Migration;

/**
 * Handles the creation for table `item_description`.
 */
class m160913_160556_create_item_description_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item_description', [
            'id' => $this->primaryKey(),
            'accessory_of' => $this->integer(), // If this article is an accessory of
            'serial_number' => $this->string(),
            'acquisition_price' => $this->money(),// How much did the enterprise pay for it
            'sell_price' => $this->money(), // How much we are asking for
            'rent_price' => $this->money(), // How much we are asking for in rent scenario
            'sale' => $this->boolean()->defaultValue(false), // For sale or not
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('item_description_accessory_fk', 'item_description', 'accessory_of', 'item_description','id');
        $this->addForeignKey('item_description_created_by_fk', 'item_description', 'created_by', 'user', 'id');
        $this->addForeignKey('item_description_updated_by_fk', 'item_description', 'updated_by', 'user', 'id');
        // Create permissions
        Defaults::addDefaultPermissions('item-description');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('item_description');
        Defaults::deletePermissions('item-description');
    }
}
