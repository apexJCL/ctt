<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => $model->nombre
    ]);
?>
<div>
    <?= $this->render('_section_header_profile', [
        'photoUrl' => $model->getProfilePicture()
    ]) ?>
    <div class="section grey lighten-4 greedy">
        <div class="container-lazy">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>