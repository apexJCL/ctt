<?php

/* @var $this yii\web\View */

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Create Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/background.jpg',
        'titleColor' => 'white'
    ]) ?>
    <!-- Actual Form -->
    <div class="container-fluid greedy-horizontal-500 grey lighten-4 greedy">
        <div class="container">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>