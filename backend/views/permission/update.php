<?php
/**
 * @var $this yii\web\View
 * @var $model AuthItemForm
 *
 */


use common\models\AuthItemForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Update: {permission}', ['permission' => $model->name]);

?>
<?= $this->render('//layouts/_section_header', [
    'photoUrl' => '/img/showcase/users.jpg',
    'titleColor' => 'white'
]) ?>
<div class="section grey lighten-4">
    <div class="container">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col s12"><?= $form->field($model, 'name')->textInput()->label() ?></div>
            <div class="col s12"><?= $form->field($model, 'description')->textInput()->label() ?></div>
        </div>
        <div class="col s12">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'),
                Url::to(['view', 'name' => $model->name]),
                ['class' => 'waves-effect btn-flat']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="col s12">
        </div>
    </div>
</div>