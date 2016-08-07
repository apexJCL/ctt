<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_type`.
 */
class m160807_133347_create_user_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_type');
    }
}
