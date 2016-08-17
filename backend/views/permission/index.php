<?php
/**
 * @var $searchModel \common\models\AuthItemSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $this yii\web\View
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Permissions');
?>

<div>
    <div class="static-display">
        <div class="static-display__background">
            <div class="static-display__background--blurry">
                <img src="/img/showcase/users.jpg" alt="#" class="">
            </div>
        </div>
        <div class="static-display__foreground--brand-logo row">
            <div class="col l2 m4 hide-on-med-and-down">
                <img src="/img/logo.png" alt="" class="responsive-img">
            </div>
            <div class="col l10 m8 white-text raleway-bold">
                <div class="thin-line primary-overlay"></div>
                <h1><?= Html::encode($this->title) ?></>
            </div>
        </div>
    </div>
    <!-- Sección en blanco para poder ver fondo -->
    <div class="section static-display--viewport"></div>
    <div class="section grey lighten-4 fab-container">
        <div class="fixed-action-btn horizontal main-fab">
            <a class="btn-floating btn-large">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <li>
                    <?=
                    Html::a('<i class="material-icons mdi-add"></i>', ['create'], [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => "bottom",
                        'data-delay' => '1000',
                        'data-tooltip' => 'Añadir'
                    ]) ?>

                </li>
            </ul>
        </div>
        <div class="container">
            <? Pjax::begin() ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'highlight'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'description'
                ]
            ]) ?>
            <? Pjax::end() ?>
        </div>
    </div>
</div>
