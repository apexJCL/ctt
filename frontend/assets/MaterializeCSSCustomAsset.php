<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class MaterializeCSSCustomAsset extends AssetBundle{
    public $sourcePath = '@frontend/custom_libs/materialize';
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'materialize.css'
    ];

}