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
    <?= $this->render('//layouts/_section_header') ?>
    <div class="section grey lighten-5 fab-container greedy">
        <?=
        $this->render('//layouts/_fab', [
            'buttons' => [
                [
                    'permission' => 'create',
                    'link' => [
                        'options' => [
                            'class' => 'mdi mdi-add'
                        ]
                    ],
                    'url' => Url::to(['create']),
                    'options' => [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => 'bottom',
                        'data-delay' => '1000',
                        'data-tooltip' => Yii::t('app', 'Add')
                    ]
                ]
            ]
        ]) ?>
        <div class="container-lazy">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => [
                    'class' => 'slim',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
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