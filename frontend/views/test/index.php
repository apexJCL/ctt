<?php
/* @var $this yii\web\View */
?>
<?= Yii::$app->user->isGuest ? $this->render('//layouts/_login', ['model' => $model]) : '' ?>