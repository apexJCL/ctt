<?php

use yii\db\Migration;

/**
 * Handles the creation for table `status`.
 */
class m160807_133338_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status');
    }
}
