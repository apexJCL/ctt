<?php
/* @var $this yii\web\View
 * @var $model \common\models\AuthItemForm
 * */
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div>
    <div class="section grey lighten-4 greedy">
        <div class="container">
            <?= $this->render('//role/_form', [
                'model' => $model
            ]) ?>
        </div>
    </div>
</div>
