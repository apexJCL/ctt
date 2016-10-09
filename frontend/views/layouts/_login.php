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
                <!-- Body -->
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form'
                ]); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="modal-footer">
                    <?= Html::submitButton('Aceptar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>