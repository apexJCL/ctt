<?php

namespace backend\assets;

use yii\web\AssetBundle;

class MaterializeAsset extends AssetBundle{
    public $sourcePath = '@bower/materialize/dist';
    public $publishOptions = [
        'only' => [
            'js/materialize.js',
        ]
    ];

    public $js = [
        'js/materialize.js'
    ];

    public $depends = [
        'frontend\assets\MaterializeCSSCustomAsset'
    ];
}