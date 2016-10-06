<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 05/10/2016
 * Time: 04:17 PM
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class MDBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@npm/mdbootstrap/';
    public $publishOptions = [
        'only' => [
            '*.min.css',
            '*.min.js',
            '*.woff2'
        ]
    ];
    public $js = [
        'js/tether.min.js',
        'js/bootstrap.min.js',
        'js/mdb.min.js',
    ];
    public $css = [
        'css/bootstrap.min.css'
    ];
}