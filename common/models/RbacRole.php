<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

/**
 * Class RbacRole
 * @package common\models
 *
 *
 * @property string $name
 * @property string $description
 * @property boolean $isNewRecord
 *
 */
class RbacRole extends Model
{
    public static function getRoleId($name)
    {
        return Yii::$app->authManager->getRole($name)->id;
    }

    public static function getRole($get)
    {
        $role = Yii::$app->authManager->getRole($get);
        return empty($role) ? 'x': $role;
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['description', 'required'],
            ['name', 'string', 'min' => 5, 'max' => 30],
            ['description', 'string', 'min' => 10, 'max' => 100]
        ];
    }

    public static function getRoles(){
        return Yii::$app->authManager->getRoles();
    }

    public static function getArrayDataProvider(){
        return new ArrayDataProvider([
            'allModels' => self::getRoles(),
            'sort' => [
                'attributes' => ['name', 'description']
            ],
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
    }

    public static function deleteRole($name){
        $role = Yii::$app->authManager->getRole($name);
        return Yii::$app->authManager->remove($role);
    }
}