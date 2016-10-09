<?php

use yii\helpers\Html;

/* @var $photoUrl */

?>
<!-- Page Header -->
<div class="static-display">
    <div class="static-display__background">
        <div class="static-display__background--blurry">
            <img src="<?=$photoUrl?>" alt="#" class="">
        </div>
    </div>
    <div class="static-display__foreground--profile-picture row">
        <div class="col-lg-3 col-md-4 col-sm-12 no-padding">
            <img src="<?=$photoUrl?>" alt="" class="responsive-img">
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 white-text raleway-bold hide-on-small-and-down">
            <h1>
                <div class="thin-line primary-overlay"></div>
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>
</div>
<!-- Sección en blanco para poder ver fondo -->
<div class="section static-display--viewport"></div>