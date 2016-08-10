<?php

use yii\db\Migration;

class m160810_014119_add_client_table extends Migration
{
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey()->notNull(),
            'nombre' => $this->string(50)->notNull(),
            'apellido_paterno' => $this->string(50)->notNull(),
            'apellido_materno' => $this->string(50)->notNull(),
            'email' => $this->string(50)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('client');
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
