<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-sm-12">
        <h3 class="raleway-light">
            <?= Yii::t('app', 'General info') ?>
        </h3>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="input-field col s12 m4">
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="input-field col s12 m4">
        <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="input-field col s12 m4">
        <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col s12">
        <h3 class="raleway-light"><?= Yii::t('app', 'Picture') ?></h3>
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
                    <div class="col s12">
                        <?= Html::img('/img/default_avatar.jpg', ['class' => 'responsive-img circle right', 'style' => 'max-width: 48px']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), $model->isNewRecord ?
            Url::to(['index']) :
            Url::to(['view', 'id' => $model->id]),
            ['class' => 'waves-effect btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
