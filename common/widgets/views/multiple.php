<?php

use common\widgets\Multiple;
use yii\helpers\Html;

/* @var $widget Multiple */
?>

<div class="row">
    <?= $widget->title['text'] != '' ?
        Html::tag('div', Html::tag($widget->title['tag'], $widget->title['text']), ['class' => 'col s12']) :
        ''; ?>
    <div class="<?= $widget->table['options']['outer-div-class'] ?>">
        <table class="<?= $widget->table['options']['class'] ?>" id="mt_table">
            <thead>
            <tr>
                <?php
                for ($i = 0; $i < count($widget->table_headers); $i++) {
                    echo Html::tag('th', $widget->table_headers[$i], ['class' => $widget->table['header']['class']]);
                }
                echo Html::tag('th',
                    Html::tag($widget->table['button']['tag'],
                        Html::tag($widget->table['button']['content']['tag'],
                            $widget->table['button']['content']['text'],
                            [
                                'class' => $widget->table['button']['content']['class']
                            ]),
                        [
                        'class' => $widget->table['button']['class'],
                        'href' => $widget->table['button']['href'],
                        'id' => $widget->table['button']['id']
                    ] ));
                ?>
            </tr>
            </thead>
            <tbody id="mt_body">
            </tbody>
        </table>
    </div>
</div>
<script>
    var autocomplete_data = <?= json_encode($widget->data) ?>;
</script>
