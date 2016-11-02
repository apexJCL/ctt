<?php
/**
 * @var $searchModel \common\models\AuthItemSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $this yii\web\View
 */
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Permissions');
Url::remember();
?>

<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div class="container-fluid padding-bottom-50 grey lighten-4 fab-container">
    <div class="fixed-action-btn horizontal main-fab">
        <a class="btn-floating btn-large blue ">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li>
                <?=
                Html::a('<i class="material-icons mdi-add"></i>', ['create'], [
                    'class' => 'btn-floating cyan tooltipped',
                    'data-position' => "bottom",
                    'data-delay' => '1000',
                    'data-tooltip' => 'Añadir'
                ]) ?>

            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'description',
                    [
                        'header' => Html::tag('span', ''),
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a(Html::tag('i', '', ['class' => 'mdi mdi-visibility mdi-lg black-text']),
                                Url::to(['view', 'name' => $data->name]),
                                [
                                    'class' => ['tooltipped right'],
                                    'data-pjax' => '0',
                                    'data-position' => 'bottom',
                                    'data-delay' => '200',
                                    'data-tooltip' => Yii::t('app', 'Details')
                                ]);
                        }
                    ],
                ],
                'export' => false
            ]) ?>
        </div>
    </div>
</div>
