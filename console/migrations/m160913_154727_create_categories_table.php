<?php

use console\models\Defaults;
use yii\db\Migration;

/**
 * Handles the creation for table `categories`.
 */
class m160913_154727_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(100),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('category_created_by_fk', 'category', 'created_by', 'user', 'id');
        $this->addForeignKey('category_updated_by_fk', 'category', 'updated_by', 'user', 'id');
        // Create permissions
        Defaults::addDefaultPermissions('category');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
        Defaults::deletePermissions('category');
    }
}
