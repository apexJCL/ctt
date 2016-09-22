<?php

/* @var $this yii\web\View */

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Create Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_section_header') ?>
<div>
    <!-- Actual Form -->
    <div class="section grey lighten-4 greedy">
        <div class="container">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>