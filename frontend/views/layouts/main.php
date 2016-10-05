<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\assets\BootstrapMaterializeAsset;
use yii\helpers\Html;

AppAsset::register($this);
BootstrapMaterializeAsset::register($this);
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
<!-- Loading Overlay -->
<div class="loading-overlay" id="loading">
    <div class="loading-overlay__spinner">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
