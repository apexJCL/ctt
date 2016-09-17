<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 17/09/2016
 * Time: 12:42 PM
 *
 *
 * usage structure:
 * $this->render('//layouts/_delete', [
 *      'message' => Yii::t('app', 'Are you sure you want to delete this item?'),
 *      'options' => ['class' => 'raleway-thin black-text'],
 *      'warning' => [
 *          'message' => 'This cannot be undone',
 *          'options' => [
 *              'class' => 'flow-text'
 *          ]
 *      ]
 * ]);
 *
 */
use yii\helpers\Html;

?>
<!-- Modal -->
<div class="modal red accent-4 white-text" id="delete">
    <div class="modal-content">
        <?= Html::tag('h4', $message, $options) ?>
        <?= isset($warning) ? Html::tag('p', $warning['message'], $warning['options']) : null ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" waves-effect waves-ripple btn-flat modal-close"><?= Yii::t('app', 'Cancel') ?></a>
        <?= Html::a("Eliminar", ['delete', 'id' => $model->id],
            ['class' => 'btn waves-effect waves-light red accent-2',
                'data' => [
                    'method' => 'post'
                ],
            ])
        ?>
    </div>
</div>
