<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<!--Navbar-->
<nav class="nav-ctt navbar navbar-dark raleway">
    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">
        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a href="<?= Url::to(['/']) ?>" class="raleway-bold navbar-brand">
                <span class="brand-logo">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" data-original-aspect-ratio="0.8"
                         style="width: 40px; height: 50px; fill: #ffffff; vertical-align: middle"><g
                            transform="translate(-13.066666603088379,-8.166666984558105)"><path
                                d="M22.442001 25.480001l14.504 14.373334l-17.476667 17.313334l-4.671333 -4.638666L27.570667 39.853334L13.066667 25.480001l17.476667 -17.313334l4.671333 4.638666L22.442001 25.480001zM52.266668 12.805333L47.595334 8.166667L30.118667 25.480001l17.476667 17.313334l4.671333 -4.638666L39.494001 25.480001L52.266668 12.805333z"></path></g></svg>
                    CTT EXP & RENTALS
                </span>
            </a>
            <!--Links-->
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item">
                    <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Pricing</a>
                </li>

                <?= (Yii::$app->user->isGuest) ?
                    Html::tag('li', Html::a(Yii::t('app', 'Login'), Url::to(['site/login']), ['class' => 'nav-link']),
                        ['class' => 'nav-item']) :
                    Html::tag('li',
                        Html::a(Yii::$app->user->identity->username, '#', ['class' => 'nav-link dropwdown-toggle', 'id' => 'dropdownMenu1', 'aria-haspopup' => 'true', 'aria-expanded' => 'false','data-toggle' => 'dropdown']).
                        Html::tag('div',
                            Html::a(Yii::t('app', 'Logout'), ['site/logout'], ['data' => ['method' => 'post']]),
                            ['class' => 'dropdown-menu', 'aria-labelledby' => 'dropdownMenu1']),
                        ['class' => 'nav-item btn-group'])
                ?>

                <!--                <li class="nav-item btn-group">-->
                <!--                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"-->
                <!--                       aria-expanded="false">Dropdown</a>-->
                <!--                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
                <!--                        <a class="dropdown-item">Action</a>-->
                <!--                        <a class="dropdown-item">Another action</a>-->
                <!--                        <a class="dropdown-item">Something else here</a>-->
                <!--                    </div>-->
                <!--                </li>-->
            </ul>
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navbar-->
