<?php
/**
 * Created by IntelliJ IDEA.
 * User: apex
 * Date: 8/11/16
 * Time: 08:26 AM
 * @var $links array
 * @var $options array
 * @var $this \yii\web\View
 */

use yii\web\View;

$links = json_encode($links);
$options = json_encode($options);

$script = <<< JS
// jQuery FAB Button
var links = $links;
var options = $options;
$('#wrapper').jqueryFab(links, options);
// jQuery FAB Button
JS;

$this->registerJs($script, View::POS_READY);
?>

<div id="wrapper" class=""></div>
