<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Class RbacRole
 * @package common\models
 *
 *
 * @property string name
 * @property string description
 *
 */
class RbacRole extends Model
{
    public function rules()
    {
        return [
            ['name', 'required', 'string', 'max' => 30],
            ['description', 'required', 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }

    public function saveRole(){
        if ($this->validate()){
            $auth = Yii::$app->authManager;
            $role = $auth->createRole($this->name);
            $role->description = $this->description;
            return $auth->add($role);
        }
        return false;
    }
}