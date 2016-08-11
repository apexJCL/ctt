<?php

use yii\db\Migration;

class m160810_212134_add_permissions extends Migration
{
    public function up()
    {
        // Permisos
        $auth = Yii::$app->authManager;
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage app users';
        $auth->add($manageUsers);
        // Roles
        $admin = $auth->createRole('root');
        $admin->description = 'Global admin, can do/undo everything';
        $auth->add($admin);
        // Relaciones
        $auth->addChild($admin, $manageUsers);
    }

    public function down()
    {
        Yii::$app->authManager->removeAll();
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
