<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 05:03 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapCustomAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/bootstrap';
    public $css = [
        'bootstrap.css'
    ];
    public $js = [
        'javascripts/bootstrap-sprockets.js',
        'javascripts/bootstrap.min.js'
    ];
}