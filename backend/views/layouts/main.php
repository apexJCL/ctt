<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\CommonAssets;
use backend\assets\FontAwesomeAsset;
use frontend\assets\BootstrapYetiAsset;
use frontend\assets\CTTAppAsset;
use frontend\assets\MaterializeCSSAsset;
use frontend\assets\SprintfAsset;
use kartik\base\PluginAssetBundle;
use yii\helpers\Html;

AppAsset::register($this);
PluginAssetBundle::register($this);
MaterializeCSSAsset::register($this);
BootstrapYetiAsset::register($this);
<<<<<<< HEAD
CommonAssets::register($this);
CTTAppAsset::register($this);
FontAwesomeAsset::register($this);
=======
CTTAppAsset::register($this);
SprintfAsset::register($this);
>>>>>>> backend_final

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
<<<<<<< HEAD
<?= $this->render('_header') ?>
<main>
    <?= $content ?>
</main>
<?= $this->render('@frontend/views/layouts/_footer') ?>
=======

<?= $this->render('_header') ?>

<main>
    <?= $content ?>
</main>

<?= $this->render('@frontend/views/layouts/_footer') ?>

>>>>>>> backend_final
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
