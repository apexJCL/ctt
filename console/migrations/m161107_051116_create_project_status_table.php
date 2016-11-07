<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project_status`.
 */
class m161107_051116_create_project_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project_status', [
            'id' => $this->primaryKey(),
            'descripcion' => $this->string(50),
            'color' => $this->string(7)
        ]);
        $this->batchInsert('project_status', ['descripcion', 'color'], [
            [
                'descripcion' => 'Normal',
                'color' => '#2196F3'
            ],
            [
                'descripcion' => 'Importante',
                'color' => '#FFEB3B'
            ],
            [
                'descripcion' => 'Rojo',
                'color' => '#F44336'
            ]
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project_status');
    }
}
