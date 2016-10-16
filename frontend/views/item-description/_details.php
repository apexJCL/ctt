<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/10/2016
 * Time: 05:21 PM
 *
 * @var $model \frontend\models\ItemDescription
 *
 */
use kartik\detail\DetailView;
use kartik\helpers\Html;

?>

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
    'striped' => false,
    'responsive' => false,
    'enableEditMode' => true,
    'mode' => DetailView::MODE_VIEW,
]) ?>