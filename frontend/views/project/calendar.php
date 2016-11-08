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
use frontend\assets\FullCalendarMaterialAsset;
use yii\helpers\Url;
use yii\web\View;

FullCalendarAsset::register($this);
FullCalendarMaterialAsset::register($this);

$eventUrl = Url::to(['project/calendar-fetch']);
$projectPartialUrl = Url::to(['project/details']);

$eventClicked = <<<JS
function (calEvent, jsEvent, view) {

    $.ajax({
        url: '$projectPartialUrl',
        data: {
            id: calEvent.id
        },
        method: 'get'
    }).done(function(data){
        var mdl = $('#projectModal');
        mdl.find('#projectTitle').html(data.object.nombre);
        mdl.find('#content').html(data.content);
        mdl.modal('open');
    });
}
JS;

$buttons = [
    'today' => Yii::t('app', 'Today'),
    'prev' => Yii::t('app', 'Previous'),
    'next' => Yii::t('app', 'Next'),
    'month' => Yii::t('app', 'Month'),
    'week' => Yii::t('app', 'Week'),
    'day' => Yii::t('app', 'Day'),
];

$script = /* @lang JavaScript */
    <<<SCRIPT
    var clndr = $('#calendar');
    var projectModal = $('#projectModal');
    $('.modal').modal();
    
   clndr.fullCalendar({
        weekends: true,
        header: {
            left: 'title',
            right: 'today month basicWeek prev,next'
        },
        height: "fill",
        eventSources: [
            {
                url: '$eventUrl'
            }
        ],
        eventClick: $eventClicked,
        theme: true,
        themeButtonIcons: false,
        buttonText: {
            today:    '{$buttons['today']}',
            month:    '{$buttons['month']}',
            week:     '{$buttons['week']}',
            day:      '{$buttons['day']}',
            prev:   '{$buttons['prev']}',
            next:   '{$buttons['next']}'
        }
    });
SCRIPT;

$this->registerJs($script, View::POS_READY);


?>

<div class="container-fluid padding-bottom-50">
    <div class="container">
        <div id='calendar'></div>
    </div>
</div>
<!-- Modal Structure -->
<div id="projectModal" class="modal">
    <h2 id="projectTitle"></h2>
    <hr>
    <div id="content"></div>
</div>
