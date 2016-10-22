<?php

use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header',[
    'photoUrl' => '/img/sections/brand/banner.jpg'
]) ?>
<div class="container-fluid greedy grey lighten-4 fab-container padding-top-30 padding-bottom-30">
    <?= $this->render('//layouts/_fab', [
        'buttons' => [
            [
                'permission' => 'createBrand',
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
    <div class="row">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'export' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'name',
                        [
                            'class' => kartik\grid\ActionColumn::className(),
                            'header' => Yii::t('app', 'Actions'),
                            'visibleButtons' => [
                                'view' => false,
                                'edit' => Yii::$app->user->identity->canI('editBrand'),
                                'delete' => Yii::$app->user->identity->canI('deleteBrand')
                            ],
                        ],
                    ],
                    'pjax' => true,
                    'striped' => false
                ]); ?>
            </div>
        </div>
    </div>
</div>