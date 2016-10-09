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
    <?php Pjax::begin(); ?>
    <?= $this->render('_section_header_profile', [
        'photoUrl' => $model->getProfilePicture()
    ]) ?>
    <?php Pjax::end(); ?>
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
            <div class="col-sm-s12 black-text raleway-bold show-on-small hide-on-med-and-up">
                <h1>
                    <div class="thin-line primary-overlay"></div>
                    <?= Html::encode($this->title) ?>
                </h1>
            </div>
            <div class="col-sm-12">
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
        </div>
        <!-- Modal -->
        <div class="modal red accent-4 white-text" id="delete">
            <div class="modal-content">
                <h4>¿Seguro que desea eliminar a este cliente?</h4>
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
    </div>
</div>