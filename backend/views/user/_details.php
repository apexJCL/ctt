<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 01/11/2016
 * Time: 10:34 AM
 * @var $this \yii\web\View
 * @var $model \common\models\User
 */
use kartik\detail\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-2">
            <?= Html::img($model->getProfilePicture(), ['class' => 'responsive-img circle', 'style' => 'max-width: 200px']) ?>
        </div>
        <div class="col-sm-12 col-lg-10">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><?= Yii::t('app', 'General info') ?></h3>
                        </div>
                        <div class="col-sm-12">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'nombre',
                                    'apellido_paterno',
                                    'apellido_materno',
                                    'username'
                                ],
                                'striped' => false,
                                'responsive' => true,
                                'enableEditMode' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'hAlign' => DetailView::ALIGN_LEFT
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-sm-12"><h3><?= Yii::t('app', 'Roles') ?></h3></div>
                        <div class="col-sm-12">
                            <?= GridView::widget([
                                'dataProvider' => $roleProvider,
                                'columns' => [
                                    'roleName'
                                ]
                            ]) ?>
                        </div>
                        <div class="col-sm-12">
                            <?=
                            Html::a(
                                Html::tag(
                                    'i',
                                    'add',
                                    ['class' => 'mdi']
                                ),
                                Url::to(['roles', 'id' => $model->id]),
                                ['class' => 'btn btn-primary waves-effect waves-light pull-right']
                            )
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
