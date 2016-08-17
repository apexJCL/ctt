<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/effects.css',
    ];
    public $js = [
        'js/main.js',
        'js/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'frontend\assets\MaterializeAsset',
        'frontend\assets\MaterialIconsAsset',
        'frontend\assets\MaterializeCSSCustomAsset',
        'frontend\assets\CTTAppAsset'
    ];
}
