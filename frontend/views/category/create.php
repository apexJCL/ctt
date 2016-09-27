<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
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
