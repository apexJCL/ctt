<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="input-field col s12">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'role_id')->textInput() ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'status_id')->textInput() ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'user_type_id')->textInput() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn waves-effect waves-light' : 'btn accent-2 waves-effect waves-light']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), $model->isNewRecord ?
            Url::to(['user/index']) :
            Url::to(['user/view', 'id' => $model->id]),
            ['class' => 'waves-effect btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
