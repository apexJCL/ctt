<?php
/* @var $this \yii\web\View */
use common\widgets\Multiple;

/* @var $role \backend\models\AuthItem */
/* @var $permissions \yii\db\ActiveRecord[] */

$this->title = Yii::t('app', 'Manage permissions');
?>

<div>
    <div class="section grey lighten-4">
        <div class="container-lazy">
            <?= Multiple::widget([
                'title' => [
                    'text' => Yii::t('app', 'Manage'),
                    'tag' => 'h4'
                ],
                'table_headers' => [
                    Yii::t('app', 'Permissions')
                ],
                'childrenName' => 'permissions',
                'model' => $permissions
            ]) ?>
        </div>
    </div>
</div>
