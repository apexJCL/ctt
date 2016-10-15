<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/10/2016
 * Time: 11:49 AM
 */
use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<div class="col-sm-s12 col-md-12 col-lg-12">
    <?= Html::a(
        Html::tag('i', 'chevron_left', ['class' => 'mdi']) . Yii::t('app', 'Back'),
        Url::to(['index']),
        ['class' => 'btn-flat btn waves-effect'])
    ?>
</div>
