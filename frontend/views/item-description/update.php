<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Item Description',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
