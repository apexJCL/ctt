<?php

use yii\db\Migration;

class m160816_201017_crear_rol_nuevo extends Migration
{
    public function up()
    {
        $auth = Yii::$app->getAuthManager();
        $rol = $auth->createRole('rolPrueba');
        $rol->description = 'Descripción del rol de prueba';
        $auth->add($rol);
        $auth->addChild('root', $rol);
    }

    public function down()
    {
        echo "m160816_201017_crear_rol_nuevo cannot be reverted.\n";

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
