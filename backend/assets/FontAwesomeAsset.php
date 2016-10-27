<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 26/10/2016
 * Time: 08:40 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/components/font-awesome';
    public $publishOptions = [
        'only' => [
            '*.min.css',
            '*.otf',
            '*.eot',
            '*.svg',
            '*.ttf',
            '*.woff',
            '*.woff2'
        ]
    ];
    public $css = [
        'css/font-awesome.min.css'
    ];
}