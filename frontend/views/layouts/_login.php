<?php

use common\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model LoginForm */
?>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Login') ?></h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="container row">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "<div class=\"col-sm-12 md-form\">{label}{input}{error}</div>"
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <?= Html::submitButton('Aceptar', ['class' => 'btn blue darken-1', 'name' => 'login-button']) ?>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!--/.Content-->
    </div>
</div>
