<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="section black greedy">
    <div class="container">
        <div class="row col-sm-12"><?= $name ?></div>
        <div class="row col-sm-12"><?= $message ?></div>
        <div class="row col-sm-12"><?= $exception ?></div>
    </div>
</div>