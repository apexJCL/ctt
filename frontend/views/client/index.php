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
<div class="container-fluid greedy-horizontal-500 grey lighten-4 fab-container">
    <?= $this->render('//layouts/_fab', [
        'buttons' => [
            [
                'permission' => 'createClient',
                'link' => [
                    'options' => [
                        'class' => 'mdi mdi-add'
                    ]
                ],
                'url' => Url::to(['create']),
                'options' => [
                    'class' => 'btn-floating cyan tooltipped red',
                    'data-position' => 'bottom',
                    'data-delay' => '1000',
                    'data-tooltip' => Yii::t('app', 'Add')
                ]
            ]
        ]
    ]) ?>
    <div class="container padding-top-20">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="raleway-thin"><?= Yii::t('app', 'All clients') ?></h2>
            </div>
            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">
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
    </div>
</div>