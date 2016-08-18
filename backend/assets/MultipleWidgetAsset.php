<?php

namespace backend\assets;

use yii\web\AssetBundle;

class MultipleWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/Multiple';
    public $publishOptions = [
        'only' => [
            'js/*.js'
        ]
    ];
    public $js = [
        'js/app.js'
    ];
    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}