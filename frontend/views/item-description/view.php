<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid greedy grey lighten-4 fab-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'accessory_of',
                        'serial_number',
                        'acquisition_price',
                        [
                            'attribute' => 'sell_price',
                            'format' => 'raw',
                            'value' => $model->sale ? $model->sell_price : Html::tag('span', Yii::t('app', 'Not for sale'), ['class' => 'red-text'])
                        ],
                        'rent_price',
                        'sale',
                        'created_at',
                        'updated_at',
                        'created_by',
                        'updated_by',
                        'item_id'
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
