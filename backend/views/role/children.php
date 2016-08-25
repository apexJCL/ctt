<?php

/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model \backend\models\AuthItem */
use common\widgets\Multiple;
use unclead\widgets\MultipleInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Manage role children');
$this->registerJsFile('/js/role/children_app.js', ['depends' => [
    \yii\web\JqueryAsset::className(),
    \backend\assets\MaterializeAsset::className()
]
], View::POS_END);
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg',
    'titleColor' => 'white'
]) ?>
<div>
    <div class="section grey lighten-4 greedy">
        <div class="container">
            <?php $form = ActiveForm::begin(); ?>
            <span type="hidden" data-type="1" id="authitem-type"></span>
            <div class="row">
                <div class="col s12 m6">
                    <?= $form->field($model, 'name')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col s12 m6">
                    <?= $form->field($model, 'description')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col s12 m6">
                    <?= $form->field($model, 'children')->widget(MultipleInput::className(), [
                        'allowEmptyList' => true,
                        'columns' => [
                            [
                                'name' => 'roles',
                                'title' => Yii::t('app', 'Children'),
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
                    ])->label('') ?>
                </div>
                <div class="col s12 m6">
                    <div class="card white">
                        <div class="card-content">
                            <div class="card-title"><?= Yii::t('app', 'Protip') ?>:</div>
                            <p><?= Yii::t('app', 'Here you manage relation between roles, the actual will inherit permissions from them') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <?= $form->errorSummary($model); ?>
                </div>
                <div class="col s12">
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']),
                        ['class' => 'waves-effect btn-flat']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>