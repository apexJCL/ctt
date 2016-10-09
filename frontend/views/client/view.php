<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Client */

$this->title = $model->nombre;
?>
<div>
    <?= $this->render('_section_header_profile', [
        'photoUrl' => $model->getProfilePicture()
    ]) ?>
    <div class="container-fluid greedy-horizontal-500  grey lighten-4 fab-container greedy">
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
                        'data' => [
                            'toggle' => 'modal',
                            'target' => '#deleteModal'
                        ],
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
        <div class="container row padding-top-20">
            <div class="col-sm-s12 col-md-12 col-lg-12 black-text raleway-bold show-on-small hide-on-med-and-up">
                <h1>
                    <div class="thin-line primary-overlay"></div>
                    <?= Html::encode($this->title) ?>
                </h1>
            </div>
            <div class="col-sm-s12 col-md-12 col-lg-12">
                <?= Html::a(Html::tag('i', 'chevron_left', ['class' => 'mdi']) . Yii::t('app', 'Back') , Url::to(['client/index']), ['class' => 'btn-flat btn waves-effect']) ?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="raleway-thin"><?= Yii::t('app', 'General Overview') ?></h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        'email:email',
                    ],
                ]) ?>
            </div>
            <div class="col-sm-s12 col-md-12 col-lg-12">
                <?= Html::a(Html::tag('i', 'chevron_left', ['class' => 'mdi']) . Yii::t('app', 'Back') , Url::to(['client/index']), ['class' => 'btn-flat btn']) ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modalTitle" class="modal-title"><?= Yii::t('app', 'Warning') ?></h4>
            </div>
            <div class="modal-body">
                <p><?= Yii::t('app', 'This action cannot be undone') ?></p>
            </div>
            <div class="modal-footer">
                <?= Html::a("Eliminar", ['delete', 'id' => $model->id],
                    ['class' => 'btn btn-danger waves-effect waves-light',
                        'data' => [
                            'method' => 'post'
                        ],
                    ])
                ?>
                <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Cancel') ?></button>
            </div>
        </div>
    </div>
</div>