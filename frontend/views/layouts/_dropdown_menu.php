<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 11:43 AM
 *
 * @var boolean $loginRequired
 * @var array $links
 * @var string $title
 * @var string $id
 * @var yii\web\View $this
 *
 * Link properties:
 *
 * $link = [title, url, permission, options[]];
 *
 * title = Title of the link
 * Url= Url of the link
 * Permission = Permission required to see the link
 * options[] = Options of the link
 *
 */
use yii\bootstrap\Html;


$loginRequired = isset($loginRequired) ? $loginRequired : false;
if ($loginRequired)
    if (Yii::$app->user->isGuest)
        return;
?>

<li class="nav-item btn-group">
    <a class="nav-link dropdown-toggle" id="<?= $id ?>" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false"><?= $title ?></a>
    <div class="dropdown-menu" aria-labelledby="<?= $id ?>">
        <?php
        if (isset($links))
            foreach ($links as $link) {
                if (!$loginRequired) // If login is not required
                    echo Html::a($link['title'],
                        $link['url'],
                        isset($link['options']) ? array_merge($link['options'], ['class' => 'dropdown-item']) : ['class' => 'dropdown-item']
                    );
                elseif (Yii::$app->user->identity->canI($link['permission']) || !isset($link['permission'])) // If login is required and has permission (if requested)
                    echo Html::a($link['title'],
                        $link['url'],
                        isset($link['options']) ? array_merge($link['options'], ['class' => 'dropdown-item']) : ['class' => 'dropdown-item']
                    );
            }
        ?>
    </div>
</li>