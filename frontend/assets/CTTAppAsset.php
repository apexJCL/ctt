<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CTTAppAsset extends AssetBundle {
    public $sourcePath = '@frontend/custom_libs/ctt/';
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'cust-styles.css'
    ];
    public $depends = [
        'frontend\assets\MaterializeAsset',
        'frontend\assets\MaterialIconsAsset',
        'frontend\assets\MaterializeCSSCustomAsset',
    ];
}