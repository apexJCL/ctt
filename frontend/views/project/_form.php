<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */
/* @var $form yii\widgets\ActiveForm */

$markup = <<<'HTML'
<div class="row"><div class="col-sm-1" style="min-height: 25px; min-width: 25px; color: %s"></div><div class="col-sm-11"><strong>%s</strong></div></div>
HTML;


$formatJS = <<<JS
var formatJS= function(repo) {

console.debug(repo);

  if(repo.loading){
    return repo.descripcion;
  }
  
  var markup = sprintf('$markup', repo.color, repo.descripcion);
  
  if (repo.description) {
      markup += '<h5>' + repo.description + '</h5>';
    }
    return '<div style="overflow:hidden;">' + markup + '</div>';
} 

JS;

$this->registerJs($formatJS, View::POS_HEAD);

?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-12">
        <h3><?= Yii::t('app', 'General information') ?></h3>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                <?= $form->field($model, 'client_id')->widget(Select2::className(), [
                    'options' => ['placeholder' => Yii::t('app', 'Client')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression(sprintf("function () { return '%s'; }", Yii::t('app', 'Waiting for results...'))),
                        ],
                        'ajax' => [
                            'url' => Url::to(['client/list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ]
                    ],
                ]) ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 form-group">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-6 form-group">
                <?= $form->field($model, 'lugar')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2 form-group">
                <?= $form->field($model, 'fecha_inicio')->input('date') ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2 form-group">
                <?= $form->field($model, 'fecha_fin')->input('date') ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2 form-group">
                <?= $form->field($model, 'status_id')->widget(Select2::className(), [
                    'data' => $data,
                    'options' => ['placeholder' => Yii::t('app', 'Choose a status')],
                    'pluginOptions' => [
                        'templateResult' => new JsExpression('formatJS')
                    ]
                ]) ?>
            </div>
        </div>
    </div>

    <div class="col-sm-12 form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
