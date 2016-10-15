<?php

use frontend\models\ItemDescriptionSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */
/** @var ActiveDataProvider $itemDescriptionProvider */
/** @var ItemDescriptionSearch $itemDescriptionSearch */

$this->title = $model->name;
?>
    <div>
        <?= $this->render('//layouts/_section_header') ?>
        <div class="container-fluid greedy grey lighten-4 fab-container">
            <?= $this->render('//layouts/_fab', [
                'buttons' => [
                    [
                        'permission' => 'update',
                        'link' => [
                            'options' => [
                                'class' => 'mdi mdi-edit'
                            ]
                        ],
                        'options' => [
                            'class' => 'btn-floating light-blue accent-2 tooltipped',
                            'data-position' => 'bottom',
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', 'Edit')
                        ],
                        'url' => Url::to(['update', 'id' => $model->id])
                    ],
                    [
                        'permission' => null,
                        'link' => [
                            'options' => [
                                'class' => 'mdi mdi-undo'
                            ]
                        ],
                        'options' => [
                            'class' => 'btn-floating blue tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', "Back")
                        ],
                        'url' => Url::to(['index'])
                    ]
                ]
            ]) ?>
            <div class="container">
                <div class="row">
                    <?= $this->render('//layouts/_back_button') ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="raleway-light"><?= Yii::t('app', 'Existence') ?></h3>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <!-- Aquí va la muestra de los objetos que hay con este atributo -->
                        <?=
                        GridView::widget([
                            'export' => false,
                            'pjax' => true,
                            'dataProvider' => $itemDescriptionProvider,
                            'filterModel' => $itemDescriptionSearch,
                            'columns' => [
                                'serial_number',
                                'sell_price',
                                'rent_price',
                                [
                                    'attribute' => 'sale',
                                    'filterType' => GridView::FILTER_CHECKBOX,
                                    'value' => function ($data) {
                                        return Html::checkbox($data->serial_number, $data->sale, ['disabled' => 'true']);
                                    },
                                    'format' => 'raw'
                                ],
                                [
                                    'class' => kartik\grid\ActionColumn::className(),
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                        switch ($action) {
                                            case "view":
                                                return Url::to(['item-description/view', 'id' => $model->id]);
                                            case "update":
                                                return Url::to(['item-description/update', 'id' => $model->id]);
                                            case "delete":
                                                return Url::to(['item-description/view', 'id' => $model->id]);
                                        }
                                    }

                                ]
                            ]
                        ])
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?= Html::a(
                            Html::tag('i', null, ['class' => 'mdi mdi-add']),
                            Url::to(['item-description/create', 'item_id' => $model->id]),
                            ['class' => 'btn btn-primary waves-effect right']) ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'name',
                                'description',
                                [
                                    'attribute' => 'category_id',
                                    'label' => Yii::t('app', 'Category'),
                                    'format' => 'raw',
                                    'value' => $model->getCategory()->one()->name
                                ],
                                [
                                    'attribute' => 'brand_id',
                                    'label' => Yii::t('app', 'Brand'),
                                    'format' => 'raw',
                                    'value' => $model->getBrand()->one()->name
                                ]
                            ],
                        ]) ?>
                    </div>
                    <?= $this->render('//layouts/_back_button') ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->render('//layouts/_delete', [
    'message' => Yii::t('app', 'Are you sure you want to delete this item?'),
    'options' => [
        'class' => 'raleway-light'
    ],
    'warning' => [
        'message' => 'This operation cannot be undone',
        'options' => [
            'class' => 'flow-text white-text'
        ]
    ],
    'model' => $model
]) ?>