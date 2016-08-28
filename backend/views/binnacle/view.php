<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bitacora */

$this->title = $model->id;
?>
<div class="section grey lighten-5 fab-container greedy" id="main">
    <div class="container row">
        <div class="col s12">
            <h3 class="raleway-light"><?= Yii::t('app', 'General Overview') ?></h3>
        </div>
        <div class="col s12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'fecha',
                    'accion',
                    'user_id',
                    'tabla',
                    'ip',
                ],
            ]) ?>
        </div>
        <div class="col s12">
            <h3 class="raleway-light"><?= Yii::t('app', 'Details') ?></h3>
        </div>
        <div class="col s12">
        </div>
    </div>
</div>
