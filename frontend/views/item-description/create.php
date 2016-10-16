<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $item_id integer */
/* @var $model frontend\models\ItemDescription
 * @var $dropdown array
 */

$this->title = Yii::t('app', 'Creating specific item');
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'item_id' => $item_id,
        'dropdown' => $dropdown
    ]) ?>
</div>
