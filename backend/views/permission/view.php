<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = Yii::t('app', 'Permission: {permission}', ['permission' => $model->name]);
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg',
    'titleColor' => 'white'
]) ?>
<div>
    <div class="section grey lighten-4 fab-container greedy">
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
                        ['update', 'name' => $model->name],
                        [
                            'class' => 'btn-floating light-blue accent-2 tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => 'Editar'
                        ])
                    ?>
                </li>
                <li>
                    <?= Html::a(Html::tag('i', '', ['class' => 'material-icons mdi-list']),
                        Url::to(['index']),
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
            <div class="row">
                <div class="col s12">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'name',
                            'description'
                        ]
                    ]) ?>
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
            <h4>¿Seguro que desea eliminar este permiso?</h4>
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