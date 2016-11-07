<?php
use yii\helpers\Url;

/* @var $this \yii\web\View */
?>

<div class="useful-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <a class=""
                   href="<?= Url::to(['site/index']) ?>" style="text-decoration: none">
                    <h1 class="white-text"><?= Yii::t('app', 'Sistema de Gestión Integral') ?></h1>
                </a>

            </div>
            <div class="col-lg-1 col-lg-offset-6">
                <h1 class="raleway-bold white-text">SGI</h1>
            </div>
        </div>
    </div>
</div>
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
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?=
                $this->render('_dropdown_menu', [
                    'title' => Yii::t('app', 'Business'),
                    'id' => 'businessDropdown',
                    'loginRequired' => true,
                    'links' => [
                        [
                            'url' => ['client/index'],
                            'title' => Yii::t('app', 'Clients'),
                            'permission' => 'indexClient'
                        ],
                        [
                            'title' => Yii::t('app', 'Projects'),
                            'permission' => 'indexProjects',
                            'url' => Url::to(['project/index'])
                        ]
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