<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Item Description',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-description-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
