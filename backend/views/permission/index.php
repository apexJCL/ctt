<?php
/**
 * @var $searchModel \common\models\AuthItemSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $this yii\web\View
 */
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Permissions');
?>

<div>
    <div class="section grey lighten-4">
        <div class="container">
            <? Pjax::begin() ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'highlight'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'description'
                ]
            ]) ?>
            <? Pjax::end() ?>
        </div>
    </div>
</div>
