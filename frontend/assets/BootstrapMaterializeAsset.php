<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 03/10/2016
 * Time: 10:40 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapMaterializeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/bootstrap-material-design/dist/';
    public $publishOptions = [
        'only' => [
            '*.min.css',
            '*.min.js'
        ]
    ];
    public $css = [
        'css/bootstrap-material-design.min.css',
        'css/ripples.min.css'
    ];
    public $js = [
        'js/material.min.js',
        'js/ripples.min.js'

    ];
}