<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bitacora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'accion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'tabla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
