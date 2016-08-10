<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), $model->isNewRecord ?
            Url::to(['index']) :
            Url::to(['view', 'id' => $model->id]),
            ['class' => 'waves-effect btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
