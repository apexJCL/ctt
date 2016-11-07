<?php

use kartik\grid\GridView;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/sections/clients/banner.jpg',
    'titleColor' => 'white'
]) ?>
<div class="container-fluid grey lighten-4 fab-container padding-bottom-50">
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
            ],
            [
                'permission' => null,
                'link' => [
                    'options' => [
                        'class' => 'mdi mdi-dashboard'
                    ]
                ],
                'url' => Url::to(['project/calendar']),
                'options' => [
                    'class' => 'btn-floating green tooltipped',
                    'data' => [
                        'position' => 'bottom',
                        'delay' => '1000',
                        'tooltip' => Yii::t('app', 'Calendar View')
                    ]
                ]
            ]
        ]
    ]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'nombre',
                    'lugar',
                    [
                        'attribute' => 'fecha_inicio',
                        'format' => 'date',
                    ],
                    'fecha_fin',
                    [
                        'attribute' => 'client_id',
                        'header' => Yii::t('app', 'Client'),
                        'format' => 'raw',
                        'value' => function ($data) {
                            /* @var $data \frontend\models\Project */
                            return Html::a($data->client->nombre, Url::to(['client/view', 'id' => $data->client->id]));
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                'export' => false,
                'pjax' => true
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
