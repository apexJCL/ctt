<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RbacRole */
/* @var $form ActiveForm */
?>
<div class="container">
    <?php $form = ActiveForm::begin(); ?>

    <div class="input-field col s12">
        <?= $form->field($model, 'name') ?>
    </div>
    <div class="input-field col s12">
        <?= $form->field($model, 'description') ?>
    </div>

    <div class="col s12">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
