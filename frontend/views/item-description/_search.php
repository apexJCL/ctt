<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-description-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'accessory_of') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'acquisition_price') ?>

    <?= $form->field($model, 'sell_price') ?>

    <?php // echo $form->field($model, 'rent_price') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
