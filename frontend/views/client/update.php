<?php

/* @var $this yii\web\View */
/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => $model->nombre
    ]);
?>
<div>
    <?= $this->render('_section_header_profile',[
        'photoUrl' => '/img/users/1.jpg'
    ]) ?>
    <div class="section grey lighten-4">
        <div class="container-lazy">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>