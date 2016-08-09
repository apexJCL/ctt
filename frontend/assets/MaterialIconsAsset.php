<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class MaterialIconsAsset extends AssetBundle {
    public $sourcePath =  '@vendor/mervick/material-design-icons/';
    public $publishOptions = [
        'only' => [
            'css/*.css',
            'fonts/*'
        ]
    ];
    public $css = [
        'css/material-icons.min.css'
    ];
}