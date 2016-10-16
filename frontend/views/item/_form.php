<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
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
        <?= $form->field($model, 'brand_id')->widget(\kartik\widgets\Select2::className(), [
            'options' => ['placeholder' => Yii::t('app', 'Type a few letters...')],
            'pluginOptions' => [
                'allowClear' => true,
                'language' => [
                    'errorLoading' => new JsExpression("function () { return 'Esperando resultados...'; }"),
                ],
                'ajax' => [
                    'url' => Url::to(['brand/list']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ]
            ],
        ]) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::className(), [
            'options' => ['placeholder' => Yii::t('app', 'Type a few letters...')],
            'pluginOptions' => [
                'allowClear' => true,
                'language' => [
                    'errorLoading' => new JsExpression("function () { return 'Esperando resultados...'; }"),
                ],
                'ajax' => [
                    'url' => Url::to(['category/list']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ]
            ],
        ]) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4"
    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
</div>
<!--    TODO implement category selection from a dropdown, with ajax recovery like in search style -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']), ['class' => 'btn btn-flat waves-effect waves-light']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
