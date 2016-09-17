<?php

use yii\helpers\Html;

/* @var $this yii\web\View
 * @var $model frontend\models\Item
 * @var $categories array
 * @var $brands array
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Item',
    ]) . $model->name;
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="section grey lighten-4 greedy">
        <div class="container-lazy">
            <?= $this->render('_form', [
                'model' => $model,
                'categories' => $categories,
                'brands' => $brands
            ]) ?>
        </div>
    </div>
</div>