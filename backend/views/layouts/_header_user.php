<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<header>
    <nav class="navbar ctt">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" data-activates="slide-out" class="navbar-brand button-collapse show-on-large"><i
                        class="fa fa-bars fa-lg white-text"></i>
                </a>
            </div>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav ctt">
        <li class="no-padding">
            <div class="userView" style="margin-bottom: 0px">
                <img class="background responsive-img" src="/img/menu_banner.jpg">
                <a href="#!user"><img class="circle" src="<?= Yii::$app->user->identity->getProfilePicture() ?>"></a>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion white-text">
                <li class="bold">
                    <?= Html::a(Html::tag('i', 'keyboard_arrow_down', ['class' => 'mdi left white-text']) . Yii::t('app', 'Access'), null, ['class' => "collapsible-header waves-effect waves-light blue darken-3 white-text"]) ?>
                    <div class="collapsible-body" style="">
                        <ul class="blue darken-2">
                            <li><?= Html::a(
                                    Html::tag('i', null, ['class' => 'mdi mdi-perm-identity white-text left']) . Yii::t('app', 'Users'),
                                    Url::to(['user/index']),
                                    ['class' => 'white-text no-underline'])
                                ?>
                            </li>
                            <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-people white-text left']) . Yii::t('app', 'Roles'), Url::to(['role/index']), ['class' => 'white-text']) ?></li>
                            <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-lock white-text left']) . Yii::t('app', 'Permission'), Url::to(['permission/index']), ['class' => 'white-text']) ?></li>
                            <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-book white-text left']) . Yii::t('app', 'Binnacles'), Url::to(['binnacle/index']), ['class' => 'white-text']) ?></li>
                        </ul>
                    </div>
                </li>
                <li class="no-padding">
                    <?= Html::a(Html::tag('i', 'account_circle', ['class' => 'mdi left white-text']) . Yii::$app->user->identity->username, null, ['class' => 'collapsible-header waves-effect waves-light blue darken-3 white-text']) ?>
                    <div class="collapsible-body">
                        <ul class="blue darken-2">
                            <li>
                                <?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-exit-to-app white-text left']) . Yii::t('app', 'Logout'), ['site/logout'], ['data' => ['method' => 'post'], 'class' => 'white-text']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>

</header>