<?php

use yii\db\Migration;

class m160828_001246_add_bitacora_table extends Migration
{
    public function up()
    {
        $this->createTable('bitacora', [
            'id' => $this->primaryKey(),
            'fecha' => $this->dateTime()->notNull(),
            'accion' => $this->string(50)
        ]);
        $this->createTable('bitacora_detalles', [
            'id' => $this->primaryKey(),
            'bitacora_id' => $this->integer(),
            'user_id' => $this->integer(),
            'tabla' => $this->string(50)
        ]);
        $this->createTable('bitacora_client', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'fecha' => $this->dateTime(),
            'nombre' => $this->string(50),
            'apellido_paterno' => $this->string(50),
            'apellido_materno' => $this->string(50),
            'email' => $this->string(50)
        ]);

        $this->addForeignKey('fk_bitacora_detalles_bitacora_id', 'bitacora_detalles', 'bitacora_id', 'bitacora', 'id', 'cascade');
        // Trigger update
        $this->execute('
        CREATE TRIGGER client_update AFTER UPDATE ON client
        FOR EACH ROW 
        BEGIN 
          INSERT INTO bitacora_client (user_id, fecha, nombre, apellido_paterno, apellido_materno, email)
          VALUE (OLD.id, NOW(), OLD.nombre, OLD.apellido_paterno, OLD.apellido_materno, OLD.email);
        END;
        ');
        // Trigger delete
        $this->execute('
        CREATE TRIGGER client_delete AFTER DELETE ON client
        FOR EACH ROW 
        BEGIN 
          INSERT INTO bitacora_client (user_id, fecha, nombre, apellido_paterno, apellido_materno, email)
          VALUE (OLD.id, NOW(), OLD.nombre, OLD.apellido_paterno, OLD.apellido_materno, OLD.email);
        END;
        ');
    }

    public function down()
    {
        $this->dropTable('bitacora_detalles');
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
