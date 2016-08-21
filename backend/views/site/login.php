<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="background-image mute" style="background: url(/img/background.jpg)"></div>
<div class="section white-text">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="no-margin"><?= Html::encode($this->title) ?></h1>
                <p><?= Yii::t('app', 'Please login before continue') ?></p>
            </div>
            <div class="col l5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="input-field col s12">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="input-field col s12">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                <div class="col s12">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col s12">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>