<?php
/* @var $this yii\web\View */
/* @var $model \backend\models\AuthItem */
/* @var $permissionProvider \yii\data\ArrayDataProvider */
/* @var $rolesProvider \yii\data\ArrayDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Role: {role}', ['role' => $model->name]);
Url::remember();
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg',
    'titleColor' => 'white'
]) ?>
<div>
    <div class="section grey lighten-4 fab-container greedy">
        <?= $this->render('@frontend/views/layouts/_fab', [
            'buttons' => [
                [
                    'permission' => 'deleteRole',
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
                    'permission' => 'updateRole',
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
                    'url' => Url::to(['update', 'name' => $model->name])
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
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <h4><?= Yii::t('app', 'General overview') ?></h4>
                        </div>
                        <div class="col s12">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'name',
                                    'description'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <h4><?= Yii::t('app', 'Permissions') ?></h4>
                        </div>
                        <div class="col s12">
                            <?= GridView::widget([
                                'dataProvider' => $permissionProvider,
                                'columns' => [
                                    'name',
                                    'description'
                                ]
                            ]) ?>
                        </div>
                        <div class="col s12">
                            <?= Html::a(Html::tag('i', '', ['class' => 'mdi mdi-add mdi-lg']),
                                Url::to(['permissions', 'name' => $model->name]),
                                [
                                    'class' => 'btn blue darken-2 waves-effect waves-light right'
                                ]) ?>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <h4><?= Yii::t('app', 'Children Roles') ?></h4>
                        </div>
                        <div class="col s12">
                            <?= GridView::widget([
                                'dataProvider' => $rolesProvider,
                                'columns' => [
                                    'name',
                                    'description'
                                ]
                            ]) ?>
                        </div>
                        <div class="col s12">
                            <?= Html::a(Html::tag('i', '', ['class' => 'mdi mdi-add mdi-lg']),
                                Url::to(['children', 'name' => $model->name]), [
                                    'class' => 'btn blue darken-2 waves-effect waves-light right'
                                ]) ?>
                        </div>
                        <div class="col s12">
                            <a class="waves-effect btn-flat" href="<?= Url::to(['index']) ?>">
                                <i class="mdi left mdi-keyboard-arrow-left"></i>
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal red accent-4 white-text" id="delete">
    <div class="modal-content">
        <h4>¿Seguro que desea eliminar este rol?</h4>
        <p>Esta acción no se puede revertir</p>
    </div>
    <div class="modal-footer">
        <?= Html::a("Eliminar", ['delete', 'name' => $model->name],
            ['class' => 'btn waves-effect waves-light red accent-2',
                'data' => [
                    'method' => 'post'
                ],
            ])
        ?>
        <a href="#!" class=" waves-effect waves-ripple btn-flat modal-close">Cancelar</a>
    </div>
</div>