<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-sm-12 hide-on-med-and-up">
        <h3 class="raleway-light"><?= $this->title ?></h3>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-group-sm col-sm-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group-sm col-sm-12">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-12">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']), ['class' => 'btn btn-flat waves-effect waves-white']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
