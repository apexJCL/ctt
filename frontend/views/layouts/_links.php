<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $user */
?>
<li>
    <a href="#home" class="raleway">INICIO</a>
</li>
<li>
    <a href="#inventory" class="raleway">INVENTARIOS</a>
</li>
<li>
    <a href="#!" class="raleway dropdown-button">CLIENTES</a>
</li>
<li>
    <a href="#documents" class="raleway">DOCUMENTOS</a>
</li>
<li>
    <?php
    if (Yii::$app->user->isGuest)
        echo Html::tag('a', 'INICIAR SESIÓN', ['class' => 'raleway modal-trigger', 'href' => '#login-modal']);
    else
        echo '<a href="#!"' . implode(' ', $account['data']) . ' class="raleway dropdown-button">CUENTA</a>';
    ?>
</li>
<script>

</script>

<!-- Dropdown clientes -->
<ul class="dropdown-content dropdown-content-menu" id="dropdown-clientes">
    <li><a href="#">Uno</a></li>
    <li><a href="#">Dos</a></li>
    <li><a href="#">Tres</a></li>
</ul>

<!-- Dropdown Cuenta del usuario actual -->
<ul class="dropdown-content <?= $account['class'] ?>" id="<?= $account['id'] ?>">
    <li>
        <?= Html::a(Yii::t('app', 'Logout'), ['site/logout'], ['data' => ['method' => 'post']]) ?>
    </li>
</ul>