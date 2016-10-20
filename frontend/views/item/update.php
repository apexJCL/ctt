<?php

/* @var $this yii\web\View
 * @var $model frontend\models\Item
 * @var $categories array
 * @var $brands array
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Item',
    ]) . $model->name;
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4 greedy">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
            'brands' => $brands
        ]) ?>
    </div>
</div>
