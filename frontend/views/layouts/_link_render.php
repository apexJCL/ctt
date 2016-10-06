<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 11:34 AM
 *
 * @var $url
 * @var $text
 * @var $permission
 * @var array $options
 *
 */

use yii\bootstrap\Html;

$options = isset($options) ? $options : [];

if (isset($permission) && Yii::$app->user->isGuest)
    return; // Asks for permission but guest user has no permissions

// If permission is not set, it goes through, else, it checks if the user has the permission
if (!isset($permission) || Yii::$app->user->identity->canI($permission))
    echo Html::tag('li',
        Html::a($text,
            $url,
            isset($link_options) ? $link_options : null
        ), $options);