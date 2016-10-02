<?php

use frontend\models\ItemDescription;
use frontend\models\ItemDescriptionSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */
/** @var ActiveDataProvider $itemDescriptionProvider */
/** @var ItemDescriptionSearch $itemDescriptionSearch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div>
        <?= $this->render('//layouts/_section_header') ?>
        <div class="section grey lighten-4 fab-container greedy">
            <?= $this->render('//layouts/_fab', [
                'buttons' => [
                    [
                        'permission' => 'delete',
                        'link' => [
                            'options' => [
                                'class' => 'mdi mdi-delete'
                            ]
                        ],
                        'options' => [
                            'href' => '#delete',
                            'class' => 'btn-floating red modal-trigger tooltipped',
                            'data-position' => 'bottom',
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', 'Delete')
                        ]
                    ],
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
            <div class="row container-lazy">
                <div class="col s12">
                    <h3 class="raleway-light"><?= Yii::t('app', 'Existence') ?></h3>
                </div>
                <?php \yii\widgets\Pjax::begin(); ?>
                <div class="col s12">
                    <!-- Aquí va la muestra de los objetos que hay con este atributo -->
                    <?=
                    GridView::widget([
                        'dataProvider' => $itemDescriptionProvider,
                        'filterModel' => $itemDescriptionSearch,
                        'filterRowOptions' => [
                            'class' => 'no-margin'
                        ],
                        'rowOptions' => [
                            'class' => 'slim',
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'serial_number',
                            'sell_price',
                            'rent_price',
                            'accessory_of',
                            [
                                'attribute' => 'sale',
                                'format' => 'raw',
                                'value' =>
                                    function ($data) {
                                        /* @var $data ItemDescription */
                                        return Html::tag('span',
                                            Html::input('checkbox', null, null, ['checked' => $data->sale ? 'checked' : null, 'disabled' => 'disabled', 'id' => 'forSale']) .
                                            Html::label('', 'forSale'));
                                    },
                            ],
                        ],
                    ]) ?>
                </div>
                <?php \yii\widgets\Pjax::end(); ?>
                <div class="col s12">
                    <?= Html::a(
                        Html::tag('i', 'add', ['class' => 'mdi']),
                        Url::to(['item-description/create', 'item_id' => $model->id]),
                        ['class' => 'btn right']) ?>
                </div>
            </div>
            <div class="row container-lazy">
                <div class="col s12">
                    <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
                </div>
                <div class="col s12">
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