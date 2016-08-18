<?php

namespace common\widgets;

use backend\assets\MultipleWidgetAsset;
use yii\bootstrap\Widget;

class Multiple extends Widget {

    public $childrenName = 'children';
    public $title = [
        'text' => '',
        'tag' => 'h1'
    ];
    public $data = [
        'Apple' => null,
        'Google' => null,
        'Microsoft' => null
    ];
    public $table_headers = [];
    public $table = [
        'header' => [
            'class' => ''
        ],
        'options' => [
            'class' => 'highlight',
            'outer-div-class' => 'col s12'
        ],
        'button' => [
            'tag' => 'a',
            'href' => '#!',
            'id' => 'add',
            'class' => 'btn-flat waves-effect waves-green right',
            'content' => [
                'tag' => 'i',
                'class' => 'material-icons',
                'text' => 'add',
            ]
        ]
    ];

    /**
     * Here we normalize widget properties
     */
    public function init()
    {
        parent::init();
        MultipleWidgetAsset::register($this->view);
    }

    /**
     * This method is called when rendering
     */
    public function run()
    {
        return $this->render('@common/widgets/Multiple/views/multiple',[
            'widget' => $this,
        ]);
    }

}