<?php use yii\helpers\Url; ?>
<header>
    <nav class="darken-1">
        <div class="nav-wrapper container">
            <a href="<?= Url::to(['/']) ?>" class="raleway-bold">
                <span class="brand-logo">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" data-original-aspect-ratio="0.8"
                         style="width: 40px; height: 50px; fill: #ffffff; vertical-align: middle"><g
                            transform="translate(-13.066666603088379,-8.166666984558105)"><path
                                d="M22.442001 25.480001l14.504 14.373334l-17.476667 17.313334l-4.671333 -4.638666L27.570667 39.853334L13.066667 25.480001l17.476667 -17.313334l4.671333 4.638666L22.442001 25.480001zM52.266668 12.805333L47.595334 8.166667L30.118667 25.480001l17.476667 17.313334l4.671333 -4.638666L39.494001 25.480001L52.266668 12.805333z"></path></g></svg>
                    CTT EXP & RENTALS
                </span>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <?= $this->render('_links', [
                    'account' => [
                        'id' => 'dd-account',
                        'class' => 'dropdown-content-menu',
                        'data' => [
                            'data-hover = "true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-account"'
                        ]
                    ],
                    'clients' => [
                        'id' => 'dd-clients',
                        'class' => 'dropdown-content-menu',
                        'data' => [
                            'data-hover = "true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-clients"'
                        ]
                    ],
                    'inventory' => [
                        'id' => 'dd-inventory',
                        'class' => 'dropdown-content-menu',
                        'data' => [
                            'data-hover = "true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-inventory"'
                        ]
                    ]
                ]) ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <?= $this->render('_links', [
                    'account' => [
                        'id' => 'dd-m-account',
                        'class' => '',
                        'data' => [
                            'data-hover = "true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-m-account"'
                        ]
                    ],
                    'clients' => [
                        'id' => 'dd-m-clients',
                        'class' => '',
                        'data' => [
                            'data-hover = "true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-m-clients"'
                        ]
                    ],
                    'inventory' => [
                        'id' => 'dd-m-inventory',
                        'class' => '',
                        'data' => [
                            'data-hover="true"',
                            'data-beloworigin="true"',
                            'data-activates="dd-m-inventory"'
                        ]
                    ]
                ]) ?>
            </ul>
        </div>
    </nav>
</header>