<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Please fill the next fields') ?></p>
    <div class="row">
        <div class="col s12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="input-field col s12 m4 l4">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'autofocus' => true]) ?>
            </div>
            <div class="input-field col s12 m4 l4">
                <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="input-field col s12 m4 l4">
                <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="input-field col s12">
                <?= $form->field($model, 'username')->textInput() ?>
            </div>
            <div class="input-field col s12 m6">
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="input-field col s12 m6">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>

            <div class="col s12">
                <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
