<?php

/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $model \common\models\LoginForm */

$this->title = 'CTTExp :: WebApp';
?>
<?= Yii::$app->user->isGuest ? $this->render('//layouts/_login', ['model' => $model]) : '' ?>

<!-- Aquí comienza el sitio -->

<!-- Fondo Video -->
<div class="hide-on-small-and-down">
    <video autoplay loop class="background-video">
        <source src="/video/CDMX.webm" type="video/webm">
    </video>
</div>

<div class="container-fluid primary-overlay padding-top-50 padding-bottom-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?= Yii::$app->user->isGuest ? '<h1 class="raleway-light white-text">' . Yii::t("app", "Login") . '</h1>' : '' ?>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form'
                    ]); ?>
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => false])->label(Yii::t('app', 'username'), [
                            'class' => 'white-text'
                        ]) ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('app', 'password'), [
                            'class' => 'white-text'
                        ]) ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <?= $form->field($model, 'rememberMe')->checkbox()->label(Yii::t('app', 'Remember Me'), [
                            'class' => 'white-text'
                        ]) ?>
                    </div>

                    <div class="modal-footer">
                        <?= Html::submitButton(Yii::t('app', 'Accept'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>