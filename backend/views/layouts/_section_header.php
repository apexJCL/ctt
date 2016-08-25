<?php

use yii\helpers\Html;

/* @var $photoUrl */
/* @var $titleColor */
?>
<!-- Page Header -->
<div class="static-display">
    <div class="static-display__background">
        <div class="static-display__background--blurry">
            <img src="<?=$photoUrl?>" alt="#" class="">
        </div>
    </div>
    <div class="static-display__foreground--brand-logo row">
        <img src="/img/logo.png" alt="" class="responsive-img hide-on-med-and-down">
        <span class="<?= isset($titleColor) ? $titleColor : 'white' ?>-text raleway-bold">
            <h1>
                <div class="thin-line primary-overlay"></div>
                <?= Html::encode($this->title) ?>
            </h1>
        </span>
    </div>
</div>
<!-- Sección en blanco para poder ver fondo -->
<div class="section static-display--viewport"></div>