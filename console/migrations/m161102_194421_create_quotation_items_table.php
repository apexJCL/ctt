<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotation_items`.
 */
class m161102_194421_create_quotation_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quotation_items', [
            'id' => $this->primaryKey(),
            'quotation_id' => $this->integer()->notNull(),
            'item_description_id' => $this->integer()->notNull(),
            // Agregar campos de datos que deben ser persistentes, esto quiere decir
            // no estén sujetos a cambio por actualizaciones de información en la
            // base de datos
        ]);
        $this->addForeignKey('quotation_items_quotation_fk', 'quotation_items', 'quotation_id', 'quotation', 'id', 'restrict');
        $this->addForeignKey('quotation_items_item_desc_fk', 'quotation_items', 'item_description_id', 'item_description', 'id', 'restrict');
        \console\models\Defaults::addDefaultPermissions('quotation_items');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        \console\models\Defaults::deletePermissions('quotation_items');
        $this->dropTable('quotation_items');
    }
}
