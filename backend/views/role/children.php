<?php

/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model \backend\models\AuthItem */
use common\widgets\Multiple;
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
                <?= $form->field($model, 'name')->textInput(['disabled' => true]) ?>
                <?= Multiple::widget([
                    'title' => [
                        'text' => Yii::t('app', 'Manage'),
                        'tag' => 'h4'
                    ],
                    'table_headers' => [
                        'Rol hijo'
                    ],
                    'childrenName' => 'roles'
                ]); ?>
            </div>
            <div class="col s12">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']),
                    ['class' => 'waves-effect btn-flat']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>