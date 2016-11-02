<?php

use yii\helpers\Html;

/* @var $photoUrl */
/* @var $titleColor */

?>
<div class="static-display">
    <div class="static-display__background">
        <div class="static-display__background--blurry">
            <img src="<?= isset($photoUrl) ? $photoUrl : '/img/background.jpg' ?>" alt="#" class="">
        </div>
    </div>
    <div class="static-display__foreground--brand-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <img src="/img/logo.png" alt="" class="responsive-img">
                </div>
                <div
                    class="col-lg-8 <?= isset($titleColor) ? $titleColor : 'white' ?>-text raleway-bold">
                    <h1>
                        <div class="thin-line primary-overlay"></div>
                        <?= Html::encode($this->title) ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sección en blanco para poder ver fondo -->
<div class="section static-display--viewport"></div>