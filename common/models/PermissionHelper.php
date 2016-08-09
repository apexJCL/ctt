<?php
namespace common\models;

use yii;

Class PermissionHelpers
{
    /**
     * @requireRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     * @return bool
     */
    public static function requireRole($role_name)
    {
        return Yii::$app->user->identity->role_id == ValueHelpers::getRoleValue($role_name);
    }

    /**
     * @requireMinimumRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     * @return bool
     */
    public static function requireMinimumRole($role_name)
    {
        return  Yii::$app->user->identity->role_id >= ValueHelpers::getRoleValue($role_name) ;
    }
}