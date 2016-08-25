<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Create Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('_section_header') ?>
    <!-- Actual Form -->
    <?php Pjax::begin(); ?>
    <div class="section grey lighten-4 greedy">
        <div class="container">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>