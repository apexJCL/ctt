<?php


/* @var $this yii\web\View */
/* @var $model frontend\models\Category */

$this->title = Yii::t('app', 'Create Category');
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4">
    <div class="container greedy">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>