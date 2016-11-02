<?php
/* @var $this yii\web\View
 * @var $searchModel \common\models\AuthItemSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 *
 * */

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = Yii::t('app', 'Roles');
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
])
?>
<div class="container-fluid grey lighten-4 fab-container padding-bottom-50">
    <?= $this->render('@frontend/views/layouts/_fab', [
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
                    'class' => 'btn-floating cyan tooltipped',
                    'data-position' => 'bottom',
                    'data-delay' => '1000',
                    'data-tooltip' => Yii::t('app', 'Add')
                ]
            ]
        ]
    ]) ?>
    <div class="col-sm-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'export' => false,
            'columns' => [
                ['class' => \kartik\grid\SerialColumn::className()],
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
                [
                    'header' => Html::tag('span', ''),
                    'format' => 'raw',
                    'value' => function ($data) {
                        return Html::a(Html::tag('i', '', ['class' => 'mdi mdi-supervisor-account mdi-lg black-text']),
                            Url::to(['children', 'name' => $data->name]),
                            [
                                'class' => ['tooltipped right'],
                                'data-pjax' => '0',
                                'data-position' => 'bottom',
                                'data-delay' => '200',
                                'data-tooltip' => Yii::t('app', 'Add children roles')
                            ]);
                    }
                ],
                [
                    'header' => Html::tag('span', ''),
                    'format' => 'raw',
                    'value' => function ($data) {
                        return Html::a(Html::tag('i', '', ['class' => 'mdi mdi-assignment mdi-lg black-text']),
                            Url::to(['permissions', 'name' => $data->name]),
                            [
                                'class' => ['tooltipped right'],
                                'data-pjax' => '0',
                                'data-position' => 'bottom',
                                'data-delay' => '200',
                                'data-tooltip' => Yii::t('app', 'Manage Permissions')
                            ]);
                    }
                ],
            ]
        ]) ?>
    </div>
</div>
</div>
