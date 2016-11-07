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
use yii\bootstrap\Html;
use yii\web\View;

FullCalendarAsset::register($this);

class Button
{
    var $text;
    var $click;
}

$increaseHeight = new Button();
$increaseHeight->text = Html::tag('i', null, ['class' => 'mdi mdi-add']);
$increaseHeight->click = "function(){alert('hello');}";

$script = /* @lang  JavaScript */
    <<<SCRIPT
   $('#calendar').fullCalendar({
        weekends: true,
        header: {
            left: 'incrementHeight',
            center: 'title',
            right: 'today prev,next'
        },
        height: "auto",
        customButtons: {
            incrementHeight: {
                text: '$increaseHeight->text',
                click: $increaseHeight->click
            }
        }
    });
SCRIPT;
$this->registerJs($script, View::POS_READY);


?>

<div class="container padding-bottom-50">
    <div id='calendar'></div>
</div>