<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
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
                <li>
                    <?= Yii::$app->user->identity->canI('createClient') ?
                        Html::a(Html::tag('i', '', ['class' => 'material-icons mdi-add']), ['create'], [
                            'class' => 'btn-floating cyan tooltipped',
                            'data-position' => "bottom",
                            'data-delay' => '1000',
                            'data-tooltip' => 'Añadir'
                        ]) : '' ?>
                </li>
            </ul>
        </div>
        <div class="container-lazy">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'description',
                    Yii::$app->user->identity->canI('viewCategory') ?
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
                        ] : ['value' => function($data){ return ':O'; }],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?></div>
    </div>
</div>
</div>