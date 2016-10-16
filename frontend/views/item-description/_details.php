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
use yii\helpers\Url;

?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'item_id',
            'value' => $model->item->name,
            'label' => Yii::t('app', 'Item')
        ],
        [
            'attribute' => 'accessory_of',
            'value' => isset($model->accessory_of) ? Html::a($model->accessoryOf->serial_number,
                Url::to(['item/view', 'id' => $model->accessory_of]), ["target" => "_blank"]) : Yii::t('app', 'None'),
            'format' => 'raw'
        ],
        'serial_number',
        'acquisition_price',
        [
            'attribute' => 'sell_price',
            'format' => 'raw',
            'value' => $model->sale ? $model->sell_price : Html::tag('span', Yii::t('app', 'Not for sale'), ['class' => 'red-text'])
        ],
        'rent_price',
        [
            'attribute' => 'sale',
            'value' => Html::checkbox('sale', $model->sale, ['disabled' => 'disabled']),
            'format' => 'raw'
        ],
        'created_at',
        [
            'attribute' => 'created_by',
            'value' => $model->createdBy->username
        ],
        'updated_at',
        [
            'attribute' => 'updated_by',
            'value' => $model->updatedBy->username
        ]
    ],
    'striped' => false,
    'responsive' => false,
    'enableEditMode' => true,
    'mode' => DetailView::MODE_VIEW,
]) ?>