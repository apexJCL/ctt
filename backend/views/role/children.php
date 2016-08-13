<?php

/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model \common\models\RbacRole */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Manage role children');
$this->registerJsFile('/js/role/children_app.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div>
    <div class="section grey lighten-4">
        <div class="container">
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="input-field col s12 m6 l2">
                    <?= $form->field($model, 'name')->textInput(['readonly' => true, 'disabled' => true]) ?>
                </div>
                <div class="input-field col s12 m6 l4">
                    <?= $form->field($model, 'description')->textInput(['readonly' => true, 'disabled' => true]) ?>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col s12">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']),
                    ['class' => 'waves-effect btn-flat']) ?>
            </div>
        </div>
    </div>
</div>