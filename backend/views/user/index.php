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

<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div>
    <div class="section grey lighten-5 fab-container greedy" id="main">
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
                                return Html::a(Html::tag('i', '', ['class' => 'mdi mdi-supervisor-account mdi-lg black-text']),
                                    Url::to(['roles', 'id' => $data->id]),
                                    [
                                        'class' => ['tooltipped right'],
                                        'data-pjax' => '0',
                                        'data-position' => 'bottom',
                                        'data-delay' => '200',
                                        'data-tooltip' => Yii::t('app', 'Add roles')
                                    ]);
                            }
                        ],
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
