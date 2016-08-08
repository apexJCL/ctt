<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
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
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
