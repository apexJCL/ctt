<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model frontend\models\Item
 * @var $form yii\widgets\ActiveForm
 * @var $categories array
 * @var $brands array
 */
?>

<div class="">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'brand_id')->dropDownList($brands)->label(Yii::t('app', 'Brand')) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'category_id')->dropDownList($categories)->label(Yii::t('app', 'Category')) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4"
        <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>
    <!--    TODO implement category selection from a dropdown, with ajax recovery like in search style -->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']), ['class' => 'btn btn-flat waves-effect waves-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
