<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'CTTExp & Rentals :: Admin Area';
?>
<div>
    <div class="static-display">
        <div class="static-display__background">
            <div class="static-display__background--blurry">
                <img src="/img/showcase/users.jpg" alt="#" class="">
            </div>
        </div>
        <div class="static-display__foreground--brand-logo row">
            <div class="col l2 m4 hide-on-med-and-down">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col l10 m8 white-text raleway-bold">
                <div class="thin-line primary-overlay"></div>
                <h1><?= Html::encode($this->title) ?></>
            </div>
        </div>
    </div>
    <!-- Sección en blanco para poder ver fondo -->
    <div class="section static-display--viewport"></div>
    <div class="section grey lighten-4">
        <div class="container-lazy">
            <h1>Bienvenido</h1>
        </div>
    </div>
</div>