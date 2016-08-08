<?php

namespace backend\assets;

use yii\web\AssetBundle;

class MaterializeCSSAsset extends AssetBundle{
    public $sourcePath = '@frontend/web/css';
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'materialize.css'
    ];
}