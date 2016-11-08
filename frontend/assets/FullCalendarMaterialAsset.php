<?php
/**
 * Created by IntelliJ IDEA.
 * User: apex
 * Date: 7/11/16
 * Time: 09:47 PM
 */

namespace frontend\assets;


use kartik\base\AssetBundle;

class FullCalendarMaterialAsset extends AssetBundle
{
    public $sourcePath = '@frontend/custom_libs/fullcalendar_material';
    public $css = [
        'materialFullCalendar.css',
    ];
}