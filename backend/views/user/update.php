<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User',
]) . $model->id;
?>

<div>
    <?= $this->render('//layouts/_section_header', [
        'photoUrl' => '/img/showcase/users.jpg'
    ]) ?>
    <?php Pjax::begin(); ?>
    <div class="section red green lighten-5">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 class="raleway-thin"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="col s12">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>