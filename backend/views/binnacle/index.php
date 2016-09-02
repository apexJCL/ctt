<?php

use common\helpers\CGridView;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BitacoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Binnacles');
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div class="section grey lighten-5 fab-container greedy" id="main">
    <div class="container">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'fecha',
                    'filter' => [
                        ''
                    ]
                ],
                'accion',
                'user_id',
                'tabla',
                'ip',
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
                    },
                    'filter' => [
                        'content' => 'haha'
                    ]
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
            'filterRowOptions' => [
            ],
            'tableOptions' => [
                'class' => 'table highlight'
            ]
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>