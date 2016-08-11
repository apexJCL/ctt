<?php

namespace backend\models;
use Yii;
use yii\base\Model;

class FormRole extends Model
{
    public $name;
    public $description;
    public $isNewRecord = true;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['description', 'required'],
            ['name', 'string', 'min' => 5, 'max' => 30],
            ['description', 'string', 'min' => 10, 'max' => 100]
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

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }


}