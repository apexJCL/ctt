<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <div class="static-display">
        <div class="static-display__background">
            <div class="static-display__background--blurry">
                <img src="/img/showcase/users.jpg" alt="#" class="">
            </div>
        </div>
        <div class="static-display__foreground--brand-logo row">
            <div class="col l2 m4 hide-on-med-and-down">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col l10 m8 white-text raleway-bold">
                <div class="thin-line primary-overlay"></div>
                <h1><?= Html::encode($this->title) ?></>
            </div>
        </div>
    </div>
    <!-- Sección en blanco para poder ver fondo -->
    <div class="section static-display--viewport"></div>
    <div class="section grey lighten-5 fab-container" id="main">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <li>
                    <?=
                    Html::a('<i class="material-icons">add</i>', ['create'], [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => "bottom",
                        'data-delay' => '1000',
                        'data-tooltip' => 'Añadir'
                    ]) ?>

                </li>
            </ul>
        </div>
        <div class="container-lazy">
            <div class="col s12">
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'highlight'],
                    'layout' => "{pager}\n{summary}\n{items}",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        'username',
                        'email:email',
                        [
                            'header' => Html::tag('span', ''),
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a(Html::tag('i', '', ['class' => 'mdi mdi-visibility mdi-lg black-text']),
                                    Url::to(['view', 'id' => $data->id]),
                                    [
                                        'class' => ['tooltipped right'],
                                        'data-pjax' => '0',
                                        'data-position' => 'bottom',
                                        'data-delay' => '200',
                                        'data-tooltip' => 'Ver'
                                    ]);
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?></div>
        </div>
    </div>
</div>
