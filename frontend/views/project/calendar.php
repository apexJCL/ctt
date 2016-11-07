<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/11/2016
 * Time: 04:15 PM
 * @var $this \yii\web\View
 *
 */
use frontend\assets\FullCalendarAsset;
use yii\helpers\Url;
use yii\web\View;

FullCalendarAsset::register($this);

$eventUrl = Url::to(['project/calendar-fetch']);

$script = /* @lang  JavaScript */
    <<<SCRIPT
    var clndr = $('#calendar'); 
    
   clndr.fullCalendar({
        weekends: true,
        header: {
            left: 'incrementHeight',
            center: 'title',
            right: 'today prev,next'
        },
        height: "auto",
        eventSources: [
            {
                url: '$eventUrl',
                success:  function(data) {
                  console.debug(data);
                }
            }
        ]  
    });
SCRIPT;
$this->registerJs($script, View::POS_READY);


?>

<div class="container padding-bottom-50">
    <div id='calendar'></div>
</div>