<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container padding-top-20 padding-bottom-20">
    <div class="row">
        <div class="col-sm-12 col-lg-2 padding-top-20">
            <img src="<?= $model->getProfilePicture() ?>" alt="" class="responsive-img circle">
        </div>
        <div class="col-sm-12 col-lg-9">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="raleway-light">
                        <?= Yii::t('app', 'General info') ?>
                    </h3>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3 class="raleway-light"><?= Yii::t('app', 'Picture') ?></h3>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'profilePicture')->fileInput()->label('') ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                <?= Yii::t('app', 'Protip: ') ?>
                            </div>
                            <div class="row no-margin">
                                <div class="col-sm-12">
                                    <p><?= Yii::t('app', 'If photo not uploaded, default avatar will be used') ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <?= Html::img('/img/default_avatar.jpg', ['class' => 'responsive-img circle right', 'style' => 'max-width: 48px']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['index']), ['class' => 'btn waves-effect btn-flat']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>