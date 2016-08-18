<?php

namespace common\models;

use backend\models\AuthItem;
use Yii;
use yii\base\Model;

class AuthItemForm extends Model
{
    public $name;
    public $type;
    public $description;
    public $isNewRecord = true;
    public $children;

    public function __construct(array $config)
    {
        $this->children = Yii::$app->authManager->getChildren($this->name);
        parent::__construct($config);
    }


    public static function getRoleForm($name)
    {
        $r = AuthItem::getRole($name);
        if (empty($r) or $r === null)
            return false;
        $f = new self();
        $f->name = $r->name;
        $f->description = $r->description;
        $f->type = $r->type;
        $f->isNewRecord = false;
        $f->children = AuthItem::getRolePermissions($r);
        return $f;
    }

    /**
     * Returns a form for the Permission (if exists)
     *
     * @param $name
     * @return bool|AuthItemForm
     */
    public static function getPermission($name)
    {
        $p = AuthItem::getPermission($name);
        if (empty($p) or $p === null) {
            return false;
        }
        $f = new self();
        $f->name = $p->name;
        $f->description = $p->description;
        $f->type = $p->type;
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

    /**
     * Saves a permission
     *
     * @return bool
     */
    public function savePermission()
    {
        return AuthItem::savePermission($this);
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }
}