<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bitacora */

$this->title = $model->id;
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div class="section grey lighten-5 fab-container greedy" id="main">
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
                <?= Html::a(Html::tag('i', 'list', ['class' => 'material-icons']),
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
    <div class="container row">
        <div class="col s12">
            <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
        </div>
        <div class="col s12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'fecha',
                    'accion',
                    'user_id',
                    'tabla',
                    'ip',
                ],
            ]) ?>
        </div>
        <div class="col s12">
            <h3 class="raleway-light"><?= Yii::t('app', 'Details') ?></h3>
        </div>
        <div class="col s12">
        </div>
    </div>
</div>
