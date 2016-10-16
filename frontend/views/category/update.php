<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\Category */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Category',
    ]) . $model->name;
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4">
    <div class="container greedy">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
