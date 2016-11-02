<?php

/* @var $form \yii\widgets\ActiveForm */
/* @var $model \common\models\User */

use unclead\widgets\MultipleInput;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Roles of: {name}', ['name' => $model->nombre]);

$this->registerJsFile('/js/role/children_app.js', ['depends' => [
    \yii\web\JqueryAsset::className()
]
], View::POS_END);
?>

<div class="container-fluid grey lighten-4 greedy">
    <span type="hidden" data-type="1" id="authitem-type"></span>
    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="raleway-light"><?= Yii::t('app', 'General overview') ?></h3>
            </div>
            <div class="col-sm-12 col-md-3">
                <span class="input-group"><?= $form->field($model, 'nombre')->textInput(['disabled' => true]) ?></span>
            </div>
            <div class="col-sm-12 col-md-3"><span
                    class="input-group"><?= $form->field($model, 'username')->textInput(['disabled' => true]) ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3 class="raleway-light"><?= Yii::t('app', 'Roles') ?></h3>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
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
                        'label' => Html::tag('i', '', ['class' => 'material-icons mdi-add'])
                    ],
                    'removeButtonOptions' => [
                        'class' => 'btn-flat waves-effect waves-red',
                        'label' => Html::tag('i', '', ['class' => 'material-icons mdi-delete'])
                    ]
                ])->label('') ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card white">
                    <div class="card-content">
                        <div class="card-title"><?= Yii::t('app', 'Protip') ?></div>
                        <p><?= Yii::t('app', 'Assign only the necessary role for this user') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['user/index', 'id' => $model->id]),
                    ['class' => 'btn waves-effect btn-flat']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>