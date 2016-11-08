<?php
/**
 * Created by IntelliJ IDEA.
 * User: apex
 * Date: 7/11/16
 * Time: 11:00 PM
 * @var $model \frontend\models\Project
 * @var $this \yii\web\View
 */
?>


<?= \kartik\detail\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'nombre',
        'lugar',
        'fecha_inicio',
        'fecha_fin'
    ]
]) ?>