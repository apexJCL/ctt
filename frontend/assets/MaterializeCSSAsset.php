<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 09:26 PM
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class MaterializeCSSAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/materialize';
    public $css = [
        'materialize.css'
    ];
}