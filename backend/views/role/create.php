<?php
/* @var $this yii\web\View */
use yii\widgets\Pjax;

/* @var $model \common\models\RbacRole */

$this->title = Yii::t('app', 'Creating role');
?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg'
]) ?>
<div>
    <div class="section grey lighten-4 fab-container greedy">
        <?= $this->render('_form', [
            'model' => $model
        ]) ?>
    </div>
</div>
