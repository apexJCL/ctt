<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/10/2016
 * Time: 11:49 AM
 */
use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<div class="col-sm-12">
    <?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-keyboard-arrow-left']), Url::to(['index']), ['class' => 'btn-floating light-blue']) ?>
</div>
