<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <div class="static-display">
        <div class="static-display--background">
            <img src="http://placehold.it/650x650" alt="#" class="">
        </div>
        <div class="static-display--foreground">
            <img src="http://placehold.it/650x650/6666ff/000000" alt="#" class="static-display--foreground-profile-picture">
        </div>
    </div>
    <!-- Sección en blanco para poder ver fondo -->
    <div class="section static-display--viewport"></div>
    <div class="section grey lighten-5 fab-container" id="main">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <li>
                    <?=
                    Html::a('<i class="material-icons">add</i>', ['create'], [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => "bottom",
                        'data-delay' => '1000',
                        'data-tooltip' => 'Añadir'
                    ]) ?>

                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="thin-line primary-overlay"></div>
                    <h1 class="raleway-bold"><?= Html::encode($this->title) ?></h1>
                </div>
            </div>
            <div class="col s12">
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        'username',
                        'email:email',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?></div>
        </div>
    </div>
</div>
