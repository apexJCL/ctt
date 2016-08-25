<?php

/* @var $this yii\web\View */
/* @var $model \common\models\RbacRole */

?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/showcase/users.jpg'
    ]) ?>
    <div class="section grey lighten-4 fab-container greedy">
        <div class="container">
            <?= $this->render('_form', [
                'model' => $model
            ]) ?>
        </div>
    </div>
</div>