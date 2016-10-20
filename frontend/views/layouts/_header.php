<?php
use yii\helpers\Url;

/* @var $this \yii\web\View */
?>

<nav class="navbar navbar-inverse raleway">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-primary" href="<?= Url::to(['site/index']) ?>">CTT EXP & RENTALS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <!-- Links -->
                <?=
                $this->render('_link_render', [
                    'url' => ['client/index'],
                    'text' => Yii::t('app', 'Clients'),
                    'permission' => 'indexClient',
                    'link_options' => [
                        'class' => 'text-primary'
                    ]
                ])
                ?>
                <!--  Renders Inventory Dropdown -->
                <?=
                $this->render('_dropdown_menu', [
                    'links' => [
                        [
                            'title' => Yii::t('app', 'Brands'),
                            'url' => Url::to(['brand/index']),
                            'permission' => 'indexBrand',
                            'options' => [
                                'class' => 'text-primary'
                            ]
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
                if (!Yii::$app->user->isGuest)
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>