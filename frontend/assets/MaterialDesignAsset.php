<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 01:07 PM
 */
class MaterialDesignAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-material-design/dist';
    public $publishOptions = [
        'only' => [
            '*.css',
            '*.js'
        ]
    ];
    public $css = [
        'css/bootstrap-material-design.css',
        'css/ripples.css'
    ];
    public $js = [
        'js/ripples.js',
        'js/material.js',
    ];
}