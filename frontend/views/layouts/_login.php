<?php

use common\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model LoginForm */
?>

<div id="loginModal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?= Yii::t('app', 'Login') ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Body -->
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "<div class=\"col-sm-12 form-group label-floating\">{label}{input}{error}</div>"
                        ],
                    ]); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group field-loginform-rememberme">
                        <div class="col-sm-12 checkbox">
                            <input type="hidden" name="LoginForm[rememberMe]" value="0">
                            <label>
                                <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="0"
                                       checked="">
                                <?= Yii::t('app', 'Remember Me') ?>
                            </label>
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <?= Html::submitButton('Aceptar', ['class' => 'btn blue darken-1', 'name' => 'login-button']) ?>
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>