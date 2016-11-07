<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotation`.
 */
class m161102_193205_create_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Cotizaciones
        $this->createTable('quotation', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(), // ID del proyecto al que pertenece
            'fecha' => $this->date(), // Fecha en la que se creó la cotización
        ]);
        $this->addForeignKey('quotation_project_fk', 'quotation', 'project_id', 'project', 'id', 'restrict');
        \console\models\Defaults::addDefaultPermissions('quotation');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        \console\models\Defaults::deletePermissions('quotation');
        $this->dropTable('quotation');
        return true;
    }
}
