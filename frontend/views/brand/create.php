<?php


/* @var $this yii\web\View */
/* @var $model frontend\models\Brand */

$this->title = Yii::t('app', 'Create Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header',[
    'photoUrl' => '/img/sections/brand/banner.jpg'
]) ?>
<div class="container-fluid grey lighten-4 greedy">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
