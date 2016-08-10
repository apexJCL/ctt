<?php

namespace backend\assets;

use yii\web\AssetBundle;

class CommonAssets  extends AssetBundle{
    public $sourcePath = '@frontend/web/css';
    public $css = [
        'site.css',
        'effects.css'
    ];
}