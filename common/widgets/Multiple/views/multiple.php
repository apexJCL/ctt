<?php

use common\widgets\Multiple;
use yii\helpers\Html;

/* @var $config Multiple */
?>

<div class="row">
    <?= $config->title['text'] != '' ?
        Html::tag('div', Html::tag($config->title['tag'], $config->title['text']), ['class' => 'col s12']) :
        ''; ?>
    <div class="<?= $config->table['options']['outer-div-class'] ?>">
        <table class="<?= $config->table['options']['class'] ?>" id="mt_table">
            <thead>
            <tr>
                <?php
                for ($i = 0; $i < count($config->table_headers); $i++) {
                    echo Html::tag('th', $config->table_headers[$i], ['class' => $config->table['header']['class']]);
                }
                echo Html::tag('th',
                    Html::tag($config->table['button']['tag'],
                        Html::tag($config->table['button']['content']['tag'],
                            $config->table['button']['content']['text'],
                            [
                                'class' => $config->table['button']['content']['class']
                            ]),
                        [
                            'class' => $config->table['button']['class'],
                            'href' => $config->table['button']['href'],
                            'id' => $config->table['button']['id']
                        ]));
                ?>
            </tr>
            </thead>
            <tbody id="mt_body">
            <?php
            if (!empty($config->model) && $config->model !== null) {
                for ($i = 0; $i < sizeof($config->model); $i++) {
                    echo '<tr><div class="col s8">
<input type="text" name="' . $config->childrenName . '[]" value="' . $config->model[$i]->name . '"></input>
<label for=""></label>
</div>
<div class="col s4"><a data-position="' . $i . '" class="btn-flat red removeButton" href="#" onclick="removeRow(this)" ><i class="material-icons mdi-remove"></i></a></div></tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div
    id="multiple_config"
    data-children_name="<?= $config->childrenName ?>"
>
</div>
<script>
    var autocomplete_data = <?= json_encode($config->data) ?>;
    var mt_message = <?= $config->message ?>;
</script>
