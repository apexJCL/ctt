<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
    <div class="section" style="min-height: 250px"></div>
    <div class="section grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>