<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 08/10/2016
 * Time: 03:19 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapPaperAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/bootstrap_paper' ;
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