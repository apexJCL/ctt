<?php
/* @var $this \yii\web\View */
use unclead\widgets\MultipleInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model \backend\models\AuthItem */
/* @var $permissions \yii\db\ActiveRecord[] */

$this->title = Yii::t('app', 'Manage permissions');
?>

<div>
    <div class="section grey lighten-4">
        <div class="container-lazy">
            <?php $form = ActiveForm::begin(); ?>
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
                                'name' => 'permissions',
                                'title' => Yii::t('app', 'Permissions'),
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
                    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']),
                        ['class' => 'waves-effect btn-flat']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>