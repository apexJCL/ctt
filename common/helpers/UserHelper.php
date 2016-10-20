<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 09/10/2016
 * Time: 12:00 AM
 */

namespace common\helpers;


use Yii;

class UserHelper
{
    public static function canUser($action, $controller)
    {
        if (Yii::$app->user->isGuest)
            return false; // User must be logged in to operate in the app

        return Yii::$app->user->identity->canI($action . ucfirst($controller));
    }

    public static function getPermissions($id, $hideView = false, $hideUpdate = false, $hideDelete = false)
    {
        return [
            'view' => (!$hideView) ? self::canUser('view', $id) : !$hideView,
            'update' => (!$hideUpdate) ? self::canUser('update', $id) : $hideUpdate,
            'delete' => (!$hideDelete) ? self::canUser('delete', $id) : $hideDelete
        ];
    }
}