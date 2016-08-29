<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\assets\CTTAppAsset;
use frontend\assets\MaterializeAsset;
use frontend\assets\MaterializeCSSCustomAsset;
use yii\helpers\Html;

MaterializeAsset::register($this);
MaterializeCSSCustomAsset::register($this);
CTTAppAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
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
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
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
