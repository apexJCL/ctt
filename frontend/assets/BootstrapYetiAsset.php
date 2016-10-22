<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 08/10/2016
 * Time: 04:11 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BootstrapYetiAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/bootstrap_yeti' ;
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'bootstrap.min.css',
        'bootstrap-dialog.min.css'
    ];
}