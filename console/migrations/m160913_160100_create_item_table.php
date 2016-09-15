<?php

use yii\db\Migration;

/**
 * Handles the creation for table `item`.
 */
class m160913_160100_create_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->string(200),
            'category_id' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('item_created_by_fk', 'item', 'created_by', 'user', 'id');
        $this->addForeignKey('item_updated_by_fk', 'item', 'updated_by', 'user', 'id');
        $this->addForeignKey('item_category_fk', 'item', 'category_id', 'category', 'id');
        // Create permissions
        \console\models\Defaults::addDefaultPermissions('item');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('item');
    }
}
