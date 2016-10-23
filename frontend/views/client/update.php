<?php

/* @var $this yii\web\View */

/* @var $model common\models\Client */

$this->title = Yii::t('app', 'Update client: {modelClass} ', [
    'modelClass' => $model->nombre
]);
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/sections/clients/banner.jpg',
    'titleColor' => 'white'
]) ?>
<div class="container-fluid grey lighten-4 greedy">
    <div class="container-lazy">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
