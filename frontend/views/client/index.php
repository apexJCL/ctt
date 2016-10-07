<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-greedy grey lighten-4">
    <div class="container">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => [
                'class' => 'slim',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'nombre',
                'apellido_paterno',
                'apellido_materno',
                'email:email',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>