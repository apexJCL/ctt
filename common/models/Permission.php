<?php

namespace common\models;

use Yii;
use yii\base\Model;

class Permission extends Model {
    public $name;
    public $description;

    public static function getAll()
    {

    }

    /**
     * Rules for validation
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['description', 'required'],
            ['name', 'string', 'min' => 4, 'max' => 30],
            ['description', 'string', 'min' => 10, 'max' => 100]
        ];
    }

    /**
     * Attribute labels for form completion
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }
}