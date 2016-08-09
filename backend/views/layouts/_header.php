<?php use yii\helpers\Url; ?>
<header>
    <?= !Yii::$app->user->isGuest ? $this->render('_header_user') : $this->render('_header_normal')?>
</header>