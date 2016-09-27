<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Brand */

$this->title = Yii::t('app', 'Create Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="section grey lighten-4 greedy">
        <div class="container-lazy">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>