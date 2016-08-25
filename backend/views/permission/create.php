<?php
/* @var $this yii\web\View
 * @var $model \common\models\AuthItemForm
 * */
?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/showcase/users.jpg'
    ]) ?>
    <div class="section grey lighten-4 greedy">
        <div class="container">
            <?= $this->render('//role/_form', [
                'model' => $model
            ]) ?>
        </div>
    </div>
</div>
