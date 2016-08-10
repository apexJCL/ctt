<?php

use yii\helpers\Html;

?>
<!-- Page Header -->
<div class="static-display">
    <div class="static-display__background">
        <div class="static-display__background--blurry">
            <img src="/img/sections/user/background.jpg" alt="#" class="">
        </div>
    </div>
    <div class="static-display__foreground--brand-logo row">
        <div class="col l2 m4 hide-on-small-and-down">
            <img src="/img/logo.png" alt="" class="responsive-img">
        </div>
        <div class="col l10 m8 s12 white-text raleway-bold">
            <h1>
                <div class="thin-line primary-overlay"></div>
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>
</div>
<!-- Sección en blanco para poder ver fondo -->
<div class="section static-display--viewport"></div>