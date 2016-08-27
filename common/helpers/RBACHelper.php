<?php

namespace common\helpers;

use common\models\User;
use Yii;

class RBACHelper
{

    /**
     * Based on the actual controller and action, determines whether the current user has a matching permission on
     * any of the assigned roles.
     *
     * <strong>Name of the permission is case sensitive</strong><br/><br/>
     *
     * Example:<br/>
     * Action: <strong>Index</strong><br/>
     * Controller: <strong>Client</strong><br/>
     * Permission Needed: <strong>indexClient</strong><br/>
     *
     *
     *
     * @param $action - Given by the matchCallback
     * @return boolean If the user can or not execute that action
     */
    public static function hasAccess($action)
    {
        return Yii::$app->user->can($action->id . ucfirst($action->controller->id))
        || User::hasRole(Yii::$app->user->id, 'root');
    }

}