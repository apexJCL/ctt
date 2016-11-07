<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/11/2016
 * Time: 05:05 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class MomentJSAsset extends AssetBundle
{
    public $sourcePath = '@bower/moment/min';
    public $js = [
        'moment-with-locales.min.js'
    ];
    public $publishOptions = [
        'only' => [
            '*.min.js'
        ]
    ];
}