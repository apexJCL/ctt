<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
        <span class="brand-logo center">
            <a href="<?= Url::to(['/']) ?>">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" data-original-aspect-ratio="0.8"
                 style="width: 40px; height: 50px; fill: #ffffff; vertical-align: middle"><g
                    transform="translate(-13.066666603088379,-8.166666984558105)"><path
                        d="M22.442001 25.480001l14.504 14.373334l-17.476667 17.313334l-4.671333 -4.638666L27.570667 39.853334L13.066667 25.480001l17.476667 -17.313334l4.671333 4.638666L22.442001 25.480001zM52.266668 12.805333L47.595334 8.166667L30.118667 25.480001l17.476667 17.313334l4.671333 -4.638666L39.494001 25.480001L52.266668 12.805333z"></path></g></svg>
                    CTT EXP & RENTALS
                </a>
                </span>
            <ul id="slide-out" class="side-nav">
                <li>
                    <div class="userView">
                        <img class="background" src="http://placehold.it/320x220">
                        <a href="#!user"><img class="circle" src="<?=Yii::$app->user->identity->getProfilePicture()?>"></a>
                        <a href="#!name"><span class="white-text name"><?= Yii::$app->user->identity->username ?></span></a>
                        <a href="#!email"><span class="white-text email"><?= Yii::$app->user->identity->email ?></span></a>
                    </div>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold">
                            <div class="collapsible-header waves-effect black-text active" id="userCollapsible">
                                Usuarios
                            </div>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li id="user">
                                        <?= Html::a(Yii::t('app', 'Manage'), Url::to(['user/index'])) ?>
                                    </li>
                                    <li id="role">
                                        <?= Html::a(Yii::t('app', 'Roles'), Url::to(['role/index'])) ?>
                                    </li>
                                    <li id="permission">
                                        <?= Html::a(Yii::t('app', 'Permissions'), Url::to(['permission/index'])) ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-ripple">Components</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-ripple">JavaScript</a>
                            <div class="collapsible-body" style="display: block;">
                                <ul>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <div class="divider"></div>
                </li>
                <li><a class="subheader">Cuenta</a></li>
                <li>
                    <?= Html::a(Yii::t('app', 'Logout'), ['site/logout'], ['data' => ['method' => 'post']]) ?>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i
                    class="material-icons">menu</i></a>
        </div>
    </nav>
</div>