<?php

use kartik\grid\GridView;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ItemDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Item Descriptions');
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="section greedy-horizontal-300 grey lighten-4 fab-container">
        <?= $this->render('//layouts/_fab', [
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

                    'id',
                    'accessory_of',
                    'serial_number',
                    'acquisition_price',
                    'sell_price',
                    [
                        'attribute' => 'sale',
                        'filterType' => GridView::FILTER_CHECKBOX,
                        'value' => function($data){
                            return Html::checkbox($data->serial_number, $data->sale, ['disabled' => 'true']);
                        },
                        'format' => 'raw'
                    ],
                    // 'rent_price',
                    // 'sale',
                    // 'created_at',
                    // 'updated_at',
                    // 'created_by',
                    // 'updated_by',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
                'pjax' => true,
                'export' => false
            ]); ?>
        </div>
    </div>
</div>