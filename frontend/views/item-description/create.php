<?php


/* @var $this yii\web\View */
/* @var $item_id integer */
/* @var $model frontend\models\ItemDescription
 * @var $dropdown array
 */

$this->title = Yii::t('app', 'Creating specific item of {item}', [
    'item' => $model->item->name,
]);
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
            'item_id' => $item_id,
            'dropdown' => $dropdown
        ]) ?>
    </div>
</div>