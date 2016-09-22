<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */

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
        <div class="container-lazy">
            <div class="row">
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
    <?= var_dump($existence) ?>
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