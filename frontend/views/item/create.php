<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model frontend\models\Item
 * @var $categories array
 * @var $brands array
 *
 */

$this->title = Yii::t('app', 'Create Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="section greedy grey lighten-4">
        <div class="container">
            <?= $this->render('_form', [
                'model' => $model,
                'categories' => $categories,
                'brands' => $brands
            ]) ?>
        </div>
    </div>
</div>
