<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', '{name}', ['name' => $model->nombre ? $model->nombre : $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?= $this->render('_section_header_profile', [
        'photoUrl' => $model->getProfilePicture()
    ]) ?>
    <div class="section grey lighten-4 fab-container greedy">
        <?= $this->render('@frontend/views/layouts/_fab', [
            'buttons' => [
                [
                    'permission' => 'deleteUser',
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
                    'permission' => 'updateUser',
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
                <div class="col s12">
                    <a class="waves-effect btn-floating btn-flat" href="<?= Url::to(['index']) ?>">
                        <i class="mdi black-text">undo</i>
                    </a>
                </div>
                <div class="col s12">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'username',
                            'nombre',
                            'apellido_paterno',
                            'apellido_materno',
                            'email:email',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
                <div class="col s12">
                    <h3><?= Yii::t('app', 'Roles') ?></h3>
                </div>
                <div class="col s12">
                    <?= GridView::widget([
                        'dataProvider' => $roleProvider,
                        'columns' => [
                            'roleName'
                        ]
                    ]) ?>
                </div>
                <div class="col s2 right">
                    <?= Html::a(Html::tag('i', 'add', ['class' => 'mdi']), Url::to(['roles', 'id' => $model->id]), ['class' => 'btn waves-effect waves-light']) ?>
                </div>
                <div class="col s12">
                    <a class="waves-effect btn-floating btn-flat" href="<?= Url::to(['index']) ?>">
                        <i class="mdi black-text">undo</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal red accent-4 white-text" id="delete">
        <div class="modal-content">
            <h4>¿Seguro que desea eliminar a este usuario?</h4>
            <p>Esta acción no se puede revertir</p>
        </div>
        <div class="modal-footer">
            <?= Html::a("Eliminar", ['delete', 'id' => $model->id],
                ['class' => 'btn waves-effect waves-light red accent-2',
                    'data' => [
                        'method' => 'post'
                    ],
                ])
            ?>
            <a href="#!" class=" waves-effect waves-ripple btn-flat modal-close">Cancelar</a>
        </div>
    </div>
</div>
