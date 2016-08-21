<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <!-- Personal Info -->
        <div class="col s12">
            <h4><?= Yii::t('app', 'Personal Info') ?></h4>
        </div>
        <div
            class="input-field col s12 m4 l4"><?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?></div>
        <div
            class="input-field col s12 m4 l4"><?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?></div>
        <div
            class="input-field col s12 m4 l4"><?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?></div>
        <div
            class="input-field col s12 m6 l4"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
        <div
            class="input-field col s12 m6 l4"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
        <div class="input-field col s12 m6 l4"><?= $form->field($model, 'password')->passwordInput() ?></div>
        <!-- Profile Picture -->
        <div class="col s12">
            <h4><?= Yii::t('app', 'Profile Picture') ?></h4>
        </div>
        <div class="input-field col s12 m6">
            <div class="file-field input-field">
                <div class="btn">
                <span>
                    <i class="material-icons mdi-add-a-photo"></i>
                </span>
                    <?= $form->field($model, 'profilePicture')->fileInput()->label('') ?>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        <?= Yii::t('app', 'Protip: ') ?>
                    </div>
                    <div class="row no-margin">
                        <div class="col s12">
                            <p><?= Yii::t('app', 'If photo not uploaded, default avatar will be used') ?></p>
                        </div>
                        <div class="col s2 offset-s10">
                            <?= Html::img('/img/default_avatar.jpg', ['class' => 'responsive-img circle', 'style' => 'max-width: 48px']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Options-->
        <div class="col s12">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn waves-effect waves-light' : 'btn accent-2 waves-effect waves-light']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'), $model->isNewRecord ?
                Url::to(['index']) :
                Url::to(['view', 'id' => $model->id]),
                ['class' => 'waves-effect btn-flat']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
