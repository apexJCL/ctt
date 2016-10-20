<?php

use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/views/client.js', [
    'depends' => \kartik\base\PluginAssetBundle::className(),
    'position' => \yii\web\View::POS_END
])
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/background.jpg',
    'titleColor' => 'white'
]) ?>
<div class="container-fluid padding-bottom-50 greedy-horizontal-500 grey lighten-4 fab-container">
    <?= $this->render('//layouts/_fab', [
        'buttons' => [
            [
                'permission' => 'createClient',
                'link' => [
                    'options' => [
                        'class' => 'mdi mdi-add'
                    ]
                ],
                'url' => Url::to(['create']),
                'options' => [
                    'class' => 'btn-floating cyan tooltipped red',
                    'data-position' => 'bottom',
                    'data-delay' => '1000',
                    'data-tooltip' => Yii::t('app', 'Add')
                ]
            ]
        ]
    ]) ?>
    <div class="container padding-top-20">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="raleway-thin"><?= Yii::t('app', 'All clients') ?></h2>
            </div>
            <div class="col-sm-12">
            </div>
            <div class="col-sm-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'export' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'nombre',
                        'email:email',
                        [
                            'class' => kartik\grid\ExpandRowColumn::className(),
                            'detailUrl' => Url::to(['client/details']),
                            'value' => function ($model, $key, $index) {
                                return GridView::ROW_COLLAPSED;
                            },
                            'detailRowCssClass' => GridView::TYPE_DEFAULT,
                            'expandIcon' => '<i class="mdi mdi-expand-less"></i>',
                            'collapseIcon' => '<i class="mdi mdi-expand-more"></i>',
                        ],
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'visibleButtons' => [
                                'view' => false
                            ],
                            'header' => Yii::t('app', 'Actions'),
                        ],
                    ],
                    'pjax' => true,
                    'options' => [
                        'id' => 'clientGrid'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>