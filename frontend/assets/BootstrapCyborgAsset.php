<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 08/10/2016
 * Time: 01:14 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapCyborgAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/bootstrap_cyborg' ;
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'bootstrap.min.css'
    ];
    public $depends = [
        'frontend\assets\BootstrapFullAsset'
    ];

}