<?php

/* @var $this yii\web\View */

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => $model->nombre
]);
?>
<?= $this->render('_section_header_profile', [
    'photoUrl' => $model->getProfilePicture()
]) ?>
<div class="container-fluid grey lighten-4 greedy">
    <div class="container-lazy">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
