<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ItemDescription */

$this->title = Yii::t('app', 'Create Item Description');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-description-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
