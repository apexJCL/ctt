<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 19/10/2016
 * Time: 11:41 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class SprintfAsset extends AssetBundle
{
    public $sourcePath = '@bower/sprintf/dist/';
    public $publishOptions = [
        'only' => [
            '*.min.js'
        ]
    ];
    public $js = [
        'sprintf.min.js'
    ];
}