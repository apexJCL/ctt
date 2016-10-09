<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 05/10/2016
 * Time: 11:26 AM
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class BootstrapFullAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/';

    public $publishOptions = [
        'only' => [
            'dist/css/*.min.css',
            'dist/js/*.min.js',
            'dist/fonts/*.woff',
        ]
    ];

    public $css = [
        'dist/css/bootstrap.min.css',
    ];

    public $js = [
        'dist/js/bootstrap.min.js',
    ];
}