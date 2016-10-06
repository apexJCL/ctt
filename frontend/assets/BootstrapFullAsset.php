<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 05/10/2016
 * Time: 11:26 AM
 */

namespace frontend\assets;


use kartik\base\AssetBundle;

class BootstrapFullAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist/';

    public $publishOptions = [
        'only' => [
            '*.css',
            '*.min.js'
        ]
    ];

    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap.css'
    ];
    public $js = [
        'js/bootstrap.min.js'
    ];
}