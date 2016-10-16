<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\Brand */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Brand',
    ]) . $model->name;
?>

<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4 greedy">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
