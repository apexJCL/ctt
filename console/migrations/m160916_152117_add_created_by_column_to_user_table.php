<?php

use yii\db\Migration;

/**
 * Handles adding created_by to table `user`.
 */
class m160916_152117_add_created_by_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'created_by', 'int');
        $this->addColumn('user', 'updated_by', 'int');
        $this->addForeignKey('user_created_by_fk', 'user', 'created_by', 'user', 'id');
        $this->addForeignKey('user_updated_by_fk', 'user', 'updated_by', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('user_created_by_fk', 'user');
        $this->dropForeignKey('user_updated_by_fk', 'user');
        $this->dropColumn('user', 'created_by');
        $this->dropColumn('user', 'updated_by');
    }
}
