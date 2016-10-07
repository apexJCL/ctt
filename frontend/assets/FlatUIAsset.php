<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 07:44 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class FlatUIAsset extends AssetBundle
{
    public $sourcePath = '@bower/flat-ui/dist';
    public $css = [
        'css/flat-ui.min.css'

    ];
    public $js = [
        'js/flat-ui.min.js'
    ];
    public $depends = [
        'frontend\assets\BootstrapFullAsset'
    ];
}