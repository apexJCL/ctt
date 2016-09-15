<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $user */
?>
<li>
    <a href="<?= Url::to(['site/index']) ?>" class="raleway">INICIO</a>
</li>
<li>
    <a href="#!" <?= implode(' ', $inventory['data']) ?> class="raleway dropdown-button">INVENTARIOS</a>
</li>
<li>
    <a href="#!" <?= implode(' ', $clients['data']) ?> class="raleway dropdown-button">CLIENTES</a>
</li>
<li>
    <a href="<?= Url::to(['item-description/index']) ?>" class="raleway">DOCUMENTOS</a>
</li>
<li>
    <?php
    if (Yii::$app->user->isGuest) {
        if ($_SERVER['REQUEST_URI'] === '/site/login')
            echo Html::tag('a', 'INICIAR SESIÓN', ['class' => 'raleway', 'href' => Url::to(['site/login'])]);
        else
            echo Html::tag('a', 'INICIAR SESIÓN', ['class' => 'raleway modal-trigger', 'href' => '#login-modal']);
    } else
        echo '<a href="#!"' . implode(' ', $account['data']) . ' class="raleway dropdown-button">' . Yii::$app->user->identity->username . '</a>';
    ?>
</li>

<!-- Dropdown clientes -->
<ul class="dropdown-content <?= $clients['class'] ?>" id="<?= $clients['id'] ?>">
    <li><a href="<?= Url::to(['client/index']) ?>">
            <?= Yii::t('app', 'Manage') ?>
        </a></li>
</ul>
<!-- Dropdown inventario -->
<ul class="dropdown-content <?= $inventory['class'] ?>" id="<?= $inventory['id'] ?>">
    <li><a href="<?= Url::to(['category/index']) ?>"><?= Yii::t('app', 'Categories') ?></a></li>
    <li><a href="<?= Url::to(['item/index']) ?>"><?= Yii::t('app', 'Items') ?></a></li>
</ul>
<!-- Dropdown Cuenta del usuario actual -->
<ul class="dropdown-content <?= $account['class'] ?>" id="<?= $account['id'] ?>">
    <li>
        <?= Html::a(Yii::t('app', 'Logout'), ['site/logout'], ['data' => ['method' => 'post']]) ?>
    </li>
</ul>