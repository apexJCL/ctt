<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 16/10/2016
 * Time: 05:07 PM
 * @var $model \frontend\models\ItemDescription
 */
use kartik\detail\DetailView; ?>

<div class="col-sm-12 col-md-6 col-lg-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3><?= Yii::t('app', 'General Information') ?></h3>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <?php

            /**
             * @var $item \frontend\models\Item
             */
            $item = $model->getItem()->one();
            echo DetailView::widget([
                'model' => $item,
                'attributes' => [
                    'name',
                    [
                        'attribute' => 'brand_id',
                        'value' => $item->brand->name,
                        'label' => Yii::t('app', 'Brand')
                    ],
                    [
                        'attribute' => 'category_id',
                        'value' => $item->category->name,
                        'label' => Yii::t('app', 'Category')
                    ],
                    'description',
                    'model'
                ]
            ]) ?>
        </div>
    </div>
</div>
