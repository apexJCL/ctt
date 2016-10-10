<?php

use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="container-fluid padding-top-20 grey lighten-5 fab-container greedy">
        <?=
        $this->render('//layouts/_fab', [
            'buttons' => [
                [
                    'permission' => 'create',
                    'link' => [
                        'options' => [
                            'class' => 'mdi mdi-add'
                        ]
                    ],
                    'url' => Url::to(['create']),
                    'options' => [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => 'bottom',
                        'data-delay' => '1000',
                        'data-tooltip' => Yii::t('app', 'Add')
                    ]
                ]
            ]
        ]) ?>
        <div class="container">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => [
                    'class' => 'slim',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'description',
                    [
                        'attribute' => 'category_id',
                        'value' => function($data){
                            return $data->category->name;
                        }
                    ],
                    [
                        'attribute' => 'brand_id',
                        'value' => function($data){
                            return $data->brand->name;
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
                'pjax' => true,
                'export' => false
            ]); ?>
        </div>
    </div>
</div>
