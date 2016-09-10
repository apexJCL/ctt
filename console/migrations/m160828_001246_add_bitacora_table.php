<?php

use yii\db\Migration;

class m160828_001246_add_bitacora_table extends Migration
{
    public function up()
    {
        $this->createTable('bitacora', [
            'id' => $this->primaryKey(),
            'fecha' => $this->dateTime()->notNull(),
            'accion' => $this->string(50)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'tabla' => $this->string(50)->notNull(),
            'ip' => $this->string(40)
        ]);
        $this->createTable('bitacora_client', [
            'id' => $this->primaryKey(),
            'fecha' => $this->dateTime(),
            'usuario_id' => $this->integer(),
            'nombre' => $this->string(50),
            'apellido_paterno' => $this->string(50),
            'apellido_materno' => $this->string(50),
            'email' => $this->string(50)
        ]);
        // Trigger update
        $this->execute('
        CREATE TRIGGER client_update AFTER UPDATE ON client
        FOR EACH ROW 
        BEGIN 
          INSERT INTO bitacora_client (usuario_id, nombre, apellido_paterno, apellido_materno, email, fecha)
          VALUE (OLD.id ,OLD.nombre, OLD.apellido_paterno, OLD.apellido_materno, OLD.email, NOW());
        END;
        ');
        // Trigger delete
        $this->execute('
        CREATE TRIGGER client_delete AFTER DELETE ON client
        FOR EACH ROW 
        BEGIN 
          INSERT INTO bitacora_client (usuario_id,nombre, apellido_paterno, apellido_materno, email, fecha)
          VALUE (OLD.id ,OLD.nombre, OLD.apellido_paterno, OLD.apellido_materno, OLD.email, NOW());
        END;
        ');
    }

    public function down()
    {
        $this->dropTable('bitacora');
        $this->dropTable('bitacora_client');
        $this->execute('DROP TRIGGER IF EXISTS client_update; DROP TRIGGER IF EXISTS client_delete;');
        return true;
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
