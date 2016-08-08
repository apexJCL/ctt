<?php use yii\helpers\Url; ?>
<header>
    <?= Yii::$app->user->isGuest ? '' : $this->render('_header_user') ?>
</header>