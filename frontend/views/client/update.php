<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => $model->nombre
    ]);
?>
<div>
    <?= $this->render('_section_header_profile',[
        'photoUrl' => '/img/users/1.jpg'
    ]) ?>
    <?php Pjax::begin(); ?>
    <div class="section grey lighten-4">
        <div class="container-lazy">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>