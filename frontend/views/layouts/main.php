<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\assets\BootstrapYetiAsset;
use frontend\assets\CTTAppAsset;
use frontend\assets\JQueryFabAsset;
use frontend\assets\MaterializeCSSAsset;
use frontend\assets\SprintfAsset;
use kartik\base\PluginAssetBundle;
use yii\helpers\Html;

AppAsset::register($this);
MaterializeCSSAsset::register($this);
PluginAssetBundle::register($this);
BootstrapYetiAsset::register($this);
CTTAppAsset::register($this);
SprintfAsset::register($this);
JQueryFabAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>
<main id="pjax-container">
    <?= $content ?>
</main>
<?= $this->render('_footer') ?>
<?php

$info = Yii::$app->session->getFlash("info");

$this->registerJs(/** @lang JavaScript */
    "
var flash_info = " . json_encode($info) . ";
", \yii\web\View::POS_END);

?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
