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
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '',
        'titleColor' => 'black'
    ]) ?>
    <div class="section grey lighten-5 fab-container greedy">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <?= Yii::$app->user->identity->canI('deleteClient') ?
                    Html::tag('li', Html::a(Html::tag('i', null, ['class' => 'mdi mdi-delete']), null, [
                        'href' => '#delete',
                        'class' => 'btn-floating red modal-trigger tooltipped',
                        'data-position' => 'bottom',
                        'data-delay' => '1000',
                        'data-tooltip' => Yii::t('app', 'Delete')
                    ])) : ''
                ?>
                <?= Yii::$app->user->identity->canI('updateClient') ?
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
                    <?= Html::a(Html::tag('i', 'undo', ['class' => 'mdi black-text']),
                        Url::to(['index']),
                        [
                            'class' => 'btn-floating white tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => Yii::t('app', "Back")
                        ]
                    ) ?>
                </li>
            </ul>
        </div>
        <div class="container row">
            <div class="col s12">
                <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
            </div>
            <div class="col s12">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'description',
                    ],
                ]) ?>
            </div>
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