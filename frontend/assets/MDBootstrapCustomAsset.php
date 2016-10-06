<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 05/10/2016
 * Time: 09:15 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class MDBootstrapCustomAsset extends AssetBundle
{

    public $sourcePath = '@frontend/custom_libs/mdbootstrap';
    public $publishOptions = [
        'only' => [
            '*.css'
        ]
    ];
    public $css = [
        'mdbootstrap.css'
    ];
    public $depends = [
        'frontend\assets\MDBootstrapAsset'
    ];

}