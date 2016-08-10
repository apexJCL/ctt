<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'frontend\assets\MaterializeCSSCustomAsset',
        'backend\assets\MaterializeAsset',
        'backend\assets\CommonAssets',
        'frontend\assets\MaterialIconsAsset',
        'frontend\assets\CTTAppAsset'
    ];
}
