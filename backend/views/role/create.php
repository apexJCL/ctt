<?php
/* @var $this yii\web\View */
/* @var $model \common\models\RbacRole */

$this->title = Yii::t('app', 'Creating role');
?>
<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/showcase/users.jpg'
    ]) ?>
    <div class="section grey lighten-4 fab-container">
        <?= $this->render('_form', [
            'model' => $model
        ]) ?>
    </div>
</div>
