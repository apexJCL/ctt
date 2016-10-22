<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/sections/brand/banner.jpg'
    ]) ?>
    <div class="section grey greedy lighten-4 fab-container greedy">
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3><?= Yii::t('app', 'Details') ?></h3>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-s12 col-md-12 col-lg-12">
                    <?= Html::a(Html::tag('i', 'chevron_left', ['class' => 'mdi']) . Yii::t('app', 'Back'), Url::to(['index']), ['class' => 'btn-flat btn waves-effect']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
