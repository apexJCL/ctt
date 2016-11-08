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
use yii\bootstrap\Html;
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
        mdl.modal('toggle');
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
    <?= $this->render('//layouts/_jfab', [
        'links' => [
            [
                "bgcolor" => "#2196F3",
                "icon" => Html::tag('i', null, ['class' => 'mdi mdi-add'])
            ],
            [
                "url" => Url::to(['site/index']),
                "bgcolor" => "#03A9F4",
                "color" => "#ffffff",
                "icon" => Html::tag('i', null, ['class' => 'mdi mdi-trash']),
                "target" => "_blank"
            ]
        ],
        'options' => [
            'rotate' => 'false'
        ]
    ]) ?>
    <div class="container">
        <div id='calendar'></div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="projectTitle">Modal title</h4>
            </div>
            <div class="modal-body" id="content">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>