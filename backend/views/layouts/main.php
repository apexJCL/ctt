<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use frontend\assets\BootstrapYetiAsset;
use frontend\assets\MaterializeCSSAsset;
use kartik\base\PluginAssetBundle;
use yii\helpers\Html;

AppAsset::register($this);
// For quick background-color support
MaterializeCSSAsset::register($this);
// Loads bootstrap and bootstrap.js
PluginAssetBundle::register($this);
//BootstrapCyborgAsset::register($this);
//BootstrapPaperAsset::register($this);
BootstrapYetiAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#4285f4">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('_header') ?>
<main>
    <?= $content ?>
</main>
<?= $this->render('@frontend/views/layouts/_footer') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
