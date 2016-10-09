<?php

use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
?>
<div>
    <?= $this->render('//layouts/_section_header') ?>
    <div class="container-fluid padding-top-30 padding-bottom-50 grey lighten-5 fab-container greedy">
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
        <div class="container">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'export' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'description',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'visibleButtons' => $permissions,
                        'header' => Yii::t('app', 'Actions'),
                    ],
                ],
                'pjax' => true,
            ]); ?>
        </div>
    </div>
</div>
