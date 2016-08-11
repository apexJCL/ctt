<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/lost.png',
        'titleColor' => 'black'
    ]) ?>
    <div class="section red lighten-4">
        <div class="container">
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p class="raleway-bold">
                <?= Yii::t('app', 'If you think this is a mistake, please contact Support.') ?>
            </p>
        </div>
    </div>
</div>