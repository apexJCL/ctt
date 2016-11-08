<?php
/**
 * Created by IntelliJ IDEA.
 * User: apex
 * Date: 8/11/16
 * Time: 08:20 AM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class JQueryFabAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/jquery-fab';
    public $publishOptions = [
        'only' => [
            '*.css',
            '*.js'
        ]
    ];
    public $css = [
        'css/jquery-fab.css'
    ];
    public $js = [
        'js/jquery-fab.js'
    ];
}