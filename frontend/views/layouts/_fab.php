<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/09/2016
 * Time: 02:44 PM
 */
use yii\helpers\Html;

/**
 * @var array $buttons
 * @var $this \yii\web\View
 *
 * How to:
 *
 * To instantiate a button, you only need to call for render this way:
 *
 * <?= $this->render('//layouts/_fab', $buttons ?>
 *
 * where $buttons is an array containing all the buttons and configurations.
 *
 *
 */
$default_options = ['class' => 'btn-primary btn-floating btn-large'];
?>
<div class="fixed-action-btn horizontal main-fab">
    <?= Html::a(
        Html::tag('i', 'menu', ['class' => 'mdi']),
        '#',
        isset($options) ? array_merge($options, $default_options) : $default_options
    ) ?>
    <ul>
        <?php
        foreach ($buttons as $button) {
            if (Yii::$app->user->identity->canI($button['permission'].ucfirst($this->context->id)) || $button['permission'] === null) {
                echo Html::tag('li',
                    Html::a(
                        Html::tag('i', isset($button['link']['content']) ? $button['link']['content'] : null, isset($button['link']['options']) ? $button['link']['options'] : null),
                        isset($button['url']) ? $button['url'] : null,
                        isset($button['options']) ? $button['options'] : null
                    ));
            }
        }
        ?>
    </ul>
</div>