<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="background-image mute" style="background: url(/img/background.jpg)"></div>
<div class="section white-text">
    <div class="container">
        <div class="row">
<<<<<<< HEAD
            <div class="col-lg-3 col-lg-offset-1 hide-on-med-and-down">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col-sm-12 col-lg-6">
=======
            <div class="col-lg-4 col-sm-12 hide-on-med-and-down">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col-sm-12 col-lg-8">
>>>>>>> backend_final
                <div class="col-sm-12 z-depth-1">
                    <h1 class="no-margin"><?= Html::encode($this->title) ?></h1>
                    <p><?= Yii::t('app', 'Please login before continue') ?></p>
                </div>
                <div class="col-sm-12">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="input-field col-sm-12">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="input-field col-sm-12">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-sm-12">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <div class="col-sm-12">
                        <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>