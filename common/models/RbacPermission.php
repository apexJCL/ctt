<?php

use yii\base\Model;
use yii\data\ArrayDataProvider;

/**
 * Class RbacPermission
 *
 */
class RbacPermission extends Model{

    public function rules()
    {
        return [
            ['name', 'required'],
            ['description', 'required'],
            ['name', 'string', 'min' => 5, 'max' => 30],
            ['description', 'string', 'min' => 10, 'max' => 100]
        ];
    }

    public static function getArrayDataProvider(){
        return new ArrayDataProvider([
            'allModels' => self::getPermissions(),
            'sort' => [
                'attributes' => ['name', 'description']
            ],
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
    }
}