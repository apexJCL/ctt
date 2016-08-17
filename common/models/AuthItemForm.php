<?php

namespace common\models;

use backend\models\AuthItem;
use Yii;
use yii\base\Model;

class FormRole extends Model
{
    public $name;
    public $description;
    public $isNewRecord = true;
    public $children = [];

    public static function getRole($name)
    {
        $r = AuthItem::getRole($name);
        if (empty($r) or $r === null)
            return false;
        $f = new self();
        $f->name = $r->name;
        $f->description = $r->description;
        $f->isNewRecord = false;
        $f->children = Yii::$app->authManager->getChildren($r->name);
        return $f;
    }

    public static function getPermission($name)
    {
        $p = AuthItem::getPermission($name);
        if (empty($r) or $r === null)
            return false;
        $f = new self();
        $f->name = $p->name;
        $f->description = $p->description;
        $f->isNewRecord = false;
        return $f;
    }

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
     * @return bool
     */
    public function saveRole()
    {
        return AuthItem::saveRole($this);
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }
}