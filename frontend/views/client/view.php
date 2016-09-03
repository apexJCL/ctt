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
    <div class="section grey lighten-4 fab-container greedy">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <?= Yii::$app->user->can('deleteClient') ?
                    Html::a(Html::tag('i', null, ['class' => 'mdi mdi-delete']), null, [
                        'href' => '#delete',
                        'class' => 'btn-floating red modal-trigger tooltipped',
                        'data-position' => 'bottom',
                        'data-delay' => '1000',
                        'data-tooltip' => Yii::t('app', 'Delete')
                    ]) : ''
                ?>
                <?= Yii::$app->user->can('editClient') ?
                    Html::tag('li', Html::a(Html::tag('i', 'edit', ['class' => 'material-icons']),
                        ['update', 'id' => $model->id],
                        [
                            'class' => 'btn-floating light-blue accent-2 tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', 'Edit')
                        ]))
                    : ''
                ?>
                <li>
                    <?= Html::a(Html::tag('i', 'list', ['class' => 'material-icons']),
                        Url::to(['index']),
                        [
                            'class' => 'btn-floating blue accent-1 tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', "User's list")
                        ]
                    ) ?>
                </li>
            </ul>
        </div>
        <div class="container row">
            <div class="col s12 black-text raleway-bold show-on-small hide-on-med-and-up">
                <h1>
                    <div class="thin-line primary-overlay"></div>
                    <?= Html::encode($this->title) ?>
                </h1>
            </div>
            <div class="col s12">
                <h3 class="raleway-thin"><?= Yii::t('app', 'General Overview') ?></h3>
            </div>
            <div class="col l4 m6 s12 ">
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