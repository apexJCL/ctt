<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'View user: {name}', ['name' => $model->nombre ? $model->nombre : $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <?= $this->render('_section_header_profile',[
        'photoUrl' => $model->getProfilePicture()
    ]) ?>
    <div class="section grey lighten-4 fab-container">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <li>
                    <a href="#delete" class="btn-floating red modal-trigger tooltipped" data-position="bottom"
                       data-delay="1000" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </li>
                <li>
                    <?= Html::a(Html::tag('i', 'edit', ['class' => 'material-icons']),
                        ['update', 'id' => $model->id],
                        [
                            'class' => 'btn-floating light-blue accent-2 tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => 'Editar'
                        ])
                    ?>
                </li>
                <li>
                    <?= Html::a(Html::tag('i', 'list', ['class' => 'material-icons']),
                        Url::to(['user/index']),
                        [
                            'class' => 'btn-floating blue accent-1 tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => 'Lista de Usuarios'
                        ]
                    ) ?>
                </li>
            </ul>
        </div>
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'nombre',
                    'apellido_paterno',
                    'apellido_materno',
                    'email:email',
                    'role_id',
                    'status_id',
                    'user_type_id',
                    'created_at',
                    'updated_at',
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
