<?php


/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = Yii::t('app', 'Create Project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('//layouts/_section_header') ?>
<div class="container-fluid grey lighten-4">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->render('_form', [
                'model' => $model,
                'data' => $data
            ]) ?>
        </div>
    </div>
</div>
