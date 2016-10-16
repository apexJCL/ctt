<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 15/10/2016
 * Time: 02:59 PM
 *
 * @var $model \common\models\Client
 *
 */

use kartik\detail\DetailView;

?>

<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <img src="<?= $model->getProfilePicture() ?>" alt="" class="materialboxed" width="250">
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'apellido_paterno',
                'apellido_materno',
            ],
            'responsive' => true,
            'bordered' => true,
            'striped' => true,
            'condensed' => false
        ]); ?>
    </div>
</div>