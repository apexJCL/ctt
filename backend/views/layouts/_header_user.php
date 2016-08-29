<?php
use yii\helpers\Html;
use yii\helpers\Url;

// TODO: Implement correct navbar
?>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="<?= Url::to(['/']) ?>" class="brand-logo--offset-left">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" data-original-aspect-ratio="0.8"
                     style="width: 40px; height: 50px; fill: #ffffff; vertical-align: middle">
                    <g
                        transform="translate(-13.066666603088379,-8.166666984558105)">
                        <path
                            d="M22.442001 25.480001l14.504 14.373334l-17.476667 17.313334l-4.671333 -4.638666L27.570667 39.853334L13.066667 25.480001l17.476667 -17.313334l4.671333 4.638666L22.442001 25.480001zM52.266668 12.805333L47.595334 8.166667L30.118667 25.480001l17.476667 17.313334l4.671333 -4.638666L39.494001 25.480001L52.266668 12.805333z"></path>
                    </g>
                </svg>
                CTT EXP & RENTALS
            </a>
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i
                    class="mdi">menu</i></a>
        </div>
    </nav>
</div>
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
                        <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-perm-identity white-text left']) . Yii::t('app', 'Users'), Url::to(['user/index']), ['class' => 'white-text']) ?></li>
                        <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-people white-text left']) . Yii::t('app', 'Roles'), Url::to(['role/index']), ['class' => 'white-text']) ?></li>
                        <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-lock white-text left']) . Yii::t('app', 'Permission'), Url::to(['permission/index']), ['class' => 'white-text']) ?></li>
                        <li><?= Html::a(Html::tag('i', null, ['class' => 'mdi mdi-book white-text left']) . Yii::t('app', 'Binnacles') , Url::to(['binnacle/index']),  ['class' => 'white-text']) ?></li>
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