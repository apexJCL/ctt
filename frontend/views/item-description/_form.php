<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accessory_of')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acquisition_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sell_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rent_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
