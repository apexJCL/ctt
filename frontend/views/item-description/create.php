<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $item_id integer */
/* @var $model frontend\models\ItemDescription */

$this->title = Yii::t('app', 'Create Item Description');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-description-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'item_id' => $item_id
    ]) ?>

</div>
