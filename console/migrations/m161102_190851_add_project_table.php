<?php

use yii\db\Migration;

class m161102_190851_add_project_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(100)->notNull(), // Nombre del proyecto
            'lugar' => $this->string(200)->notNull(), // Lugar donde se llevará
            'fecha_inicio' => $this->date(), // Fecha de Inicio,
            'fecha_fin' => $this->date(), // Fecha finalización
            'client_id' => $this->integer()->notNull(), // Cliente que lo solicitó
        ]);
        $this->addForeignKey('project_client_fk', 'project', 'client_id', 'client', 'id', 'restrict');
        \console\models\Defaults::addDefaultPermissions('project');
    }

    public function safeDown()
    {
        $this->dropTable('project');
        \console\models\Defaults::deletePermissions('project');
        return true;
    }
}
