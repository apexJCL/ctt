<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/09/2016
 * Time: 11:08 AM
 */
namespace console\models;

use Yii;

class Defaults
{
    public static $permissions = [
        'index',
        'create',
        'update',
        'delete',
        'view'
    ];

    public static function addDefaultPermissions($name)
    {
        foreach (Defaults::$permissions as $permission){
            $t = Yii::$app->authManager->createPermission($permission.ucfirst($name));
            $t->description = '---';
            Yii::$app->authManager->add($t);
        }
    }

    public static function deletePermissions($name)
    {
        $permissions = Yii::$app->authManager->getPermissions();
        foreach ($permissions as $p){
            if (strpos($p->name, ucfirst($name)) !== false)
                Yii::$app->authManager->remove($p);
        }
    }
}