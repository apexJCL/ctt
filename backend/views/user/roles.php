<?php

/* @var $form \yii\widgets\ActiveForm */
/* @var $model \common\models\User */

use unclead\widgets\MultipleInput;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/role/children_app.js', ['depends' => [
    \yii\web\JqueryAsset::className(),
    \backend\assets\MaterializeAsset::className()
]
], View::POS_END);
?>
<div>
    <div class="section grey lighten-4 greedy">
        <span type="hidden" data-type="1" id="authitem-type">
        <?php $form = ActiveForm::begin(); ?>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 class="raleway-light"><?= Yii::t('app', 'General overview') ?></h3>
                </div>
                <div class="col s12 m6 input-group">
                    <?= $form->field($model, 'nombre')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col s12 m6 input-group">
                    <?= $form->field($model, 'username')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col s12">
                    <h3 class="raleway-light"><?= Yii::t('app', 'Roles') ?></h3>
                </div>
                <div class="col s12 m8">
                    <?= $form->field($model, 'roles')->widget(MultipleInput::className(), [
                        'allowEmptyList' => true,
                        'columns' => [
                            [
                                'name' => 'roles',
                                'title' => Yii::t('app', 'Actual list of roles'),
                            ]
                        ],
                        'addButtonOptions' => [
                            'class' => 'btn-flat waves-effect waves-light',
                            'label' => Html::tag('i','', ['class' => 'material-icons mdi-add'])
                        ],
                        'removeButtonOptions' => [
                            'class' => 'btn-flat waves-effect waves-red',
                            'label' => Html::tag('i', '', ['class' => 'material-icons mdi-delete'])
                        ]
                    ]) ?>
                </div>
                <div class="col s12 m4">
                    <div class="card white">
                        <div class="card-content">
                            <div class="card-title"><?= Yii::t('app', 'Protip')?></div>
                            <p><?= Yii::t('app', 'Assign only the necessary role for this user') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['view', 'id' => $model->id]),
                        ['class' => 'waves-effect btn-flat']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
