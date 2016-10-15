<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="container-fluid grey lighten-5 fab-container greedy">
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
        <div class="container row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'description',
                    ],
                ]) ?>
            </div>
            <?= $this->render('//layouts/_back_button') ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal red accent-4 white-text" id="delete">
    <div class="modal-content">
        <h4>¿Seguro que desea eliminar esta categoria?</h4>
        <p>Esta acción no se puede revertir</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" waves-effect waves-ripple btn-flat modal-close">Cancelar</a>
        <?= Html::a("Eliminar", ['delete', 'id' => $model->id],
            ['class' => 'btn waves-effect waves-light red accent-2',
                'data' => [
                    'method' => 'post'
                ],
            ])
        ?>
    </div>
</div>