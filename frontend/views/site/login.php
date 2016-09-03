<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
?>
    <div class="section">
        <div class="background-image mute" style="background: url(/img/background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col l4 hide-on-med-and-down">
                    <img src="/img/logo.png" alt="" class="responsive-img">
                </div>
                <div class="col s12 l8">
                    <div class="col s12">
                        <h1 class="white-text"><?= Html::encode($this->title) ?></h1>
                    </div>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="input-field col s12">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="input-field col s12">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="input-field col s12">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                        <div class="col s12">
                            <div style="color:#999;margin:1em 0">
                                <?= sprintf('%s %s', Yii::t('app', 'If you forgot your password you can'), Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset'])) ?>
                                .
                            </div>
                        </div>

                        <div class="col s12">
                            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn blue darken-2', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Yii::$app->user->isGuest ? $this->render('//layouts/_login', ['model' => $model]) : '' ?>