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
        <div class="static-display__foreground--brand-logo">
            <img src="/img/logo.png" alt="" class="responsive-img hide-on-med-and-down">
            <span class="white-text raleway-bold">
                <h1>
                    <div class="thin-line primary-overlay"></div>
                    <?= Yii::t('app', 'Admin Panel') ?>
                </h1>
            </span>
        </div>
    </div>
    <!-- Sección en blanco para poder ver fondo -->
    <div class="section static-display--viewport"></div>
    <div class="section grey lighten-4 greedy">
        <div class="container-lazy">
            <h1>Bienvenido</h1>
        </div>
    </div>
</div>