<?php
/* @var $this \yii\web\View */
use unclead\widgets\MultipleInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $model \backend\models\AuthItem */
/* @var $permissions \yii\db\ActiveRecord[] */

$this->title = Yii::t('app', 'Manage permissions');
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
        <div class="container-lazy">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <span type="hidden" data-type="2" id="authitem-type"></span>
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
                                'name' => 'permissions',
                                'title' => Yii::t('app', 'Permissions'),
                                'options' => [
                                    'autocomplete' => 'off'
                                ]
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
                <div class="col s12 m4 l4">
                    <div class="card white">
                        <div class="card-content">
                            <div class="card-title"><?= Yii::t('app', 'Protip') ?>:</div>
                            <p><?= Yii::t('app', 'Here you can add or remove existing permissions for the given role') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l12">
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['view', 'name' => $model->name]),
                        ['class' => 'waves-effect btn-flat']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>