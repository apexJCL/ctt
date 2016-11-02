<?php

/* @var $this yii\web\View */
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid greedy grey lighten-4 fab-container padding-bottom-50">
    <div class="row">
        <div class="col-sm-12">
            <h3><?= Yii::t('app', 'All Users') ?></h3>
        </div>
        <div class="col-sm-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'export' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'username',
                    'nombre',
                    'email:email',
                    [
                        'class' => kartik\grid\ExpandRowColumn::className(),
                        'detailUrl' => Url::to(['user/details']),
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
                ],
                'responsive' => true
            ]); ?>
        </div>
    </div>
</div>
