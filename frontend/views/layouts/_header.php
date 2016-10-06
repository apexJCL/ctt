<?php
use yii\helpers\Url;

/* @var $this \yii\web\View */
?>
<div class="navbar nav-ctt">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
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
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--  Renders Inventory Dropdown -->
                <?=
                $this->render('_dropdown_menu', [
                    'links' => [
                        [
                            'title' => Yii::t('app', 'Brands'),
                            'url' => Url::to(['brand/index']),
                            'permission' => 'indexBrand'
                        ],
                        [
                            'title' => Yii::t('app', 'Categories'),
                            'url' => Url::to(['category/index']),
                            'permission' => 'indexCategory'
                        ],
                        [
                            'title' => Yii::t('app', 'Items'),
                            'url' => Url::to(['item/index']),
                            'permission' => 'indexItem'
                        ]
                    ],
                    'title' => Yii::t('app', 'Inventory'),
                    'id' => 'inventoryDropdown',
                    'loginRequired' => true
                ])
                ?>
                <!--  Renders User tab -->
                <?php
                if (Yii::$app->user->isGuest)
                    echo $this->render('_link_render', [
                        'url' => '#',
                        'text' => Yii::t('app', 'Login'),
                        'link_options' => [
                            'data' => ['toggle' => 'modal', 'target' => '#loginModal'],
                        ]
                    ]);
                else
                    echo $this->render('_dropdown_menu', [
                        'links' => [
                            [
                                'title' => Yii::t('app', 'Logout'),
                                'url' => ['site/logout'],
                                'options' => [
                                    'data' => ['method' => 'post'],
                                ]
                            ]
                        ],
                        'title' => Yii::$app->user->isGuest ? Yii::t('app', 'Login') : Yii::$app->user->identity->username,
                        'id' => 'userDropdown'
                    ]);
                ?>
            </ul>
        </div>
    </div>
</div>