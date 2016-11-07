<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/11/2016
 * Time: 04:13 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class FullCalendarAsset extends AssetBundle
{
    public $sourcePath = '@bower/fullcalendar/dist';
    public $publishOptions = [
        'only' => [
            '*.min.js',
            '*.min.css',
            'locale/*'
        ]
    ];
    public $css = [
        'fullcalendar.min.css'
    ];
    public $js = [
        'fullcalendar.min.js'
    ];
    public $depends = [
        'kartik\base\PluginAssetBundle',
        'frontend\assets\MomentJSAsset'
    ];
}