<?php

use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */
/* @var $form yii\widgets\ActiveForm
 * @var $item_id integer
 * @var $dropdown array
 */
?>

<div class="container">
    <div class="row">
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
        <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3><?= Yii::t('app', 'Specific Information') ?></h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= isset($model->item_id) ?
                                $form->field($model, 'item_id')->textInput(['disabled' => 'disabled', 'value' => $model->item_id])
                                :
                                $form->field($model, 'item_id')->textInput()

                            ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'accessory_of')->widget(Select2::className(), [
                                'options' => ['placeholder' => 'N° de serie...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Esperando resultados...'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => Url::to(['item-description/list']),
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ]
                                ],
                            ]) ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'acquisition_price')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'sell_price')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'rent_price')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <?= $form->field($model, 'sale')->checkbox() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group pull-right">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('app', 'Cancel'), Url::to(['item/index']), ['class' => 'btn btn-flat waves-effect waves-light']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>