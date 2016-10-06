<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 05:03 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapPaperAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/bootstrap_paper';
    public $css = [
        'bootstrap.min.css'
    ];
    public $depends = [
        'frontend\assets\BootstrapFullAsset'
    ];
}