<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 31/10/2016
 * Time: 09:55 AM
 */

namespace backend\libs\elegant;


use yii\web\AssetBundle;

class ElegantSidenavAsset extends AssetBundle
{
    public $sourcePath = '@backend/libs/elegant/assets';
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'sidebar-collapse.css'
    ];
}