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
    public $childrenRoles;

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

    public static function getRolePermissionsForm($name)
    {
        $r = AuthItem::getRole($name);
        if (empty($r) or $r === null) {
            return false;
        }
        $f = new self();
        $f->name = $r->name;
        $f->description = $r->description;
        $f->type = $r->type;
        $f->isNewRecord = false;
        $f->children = AuthItem::getRolePermissionsAsArray($r->name);
        return $f;
    }

    public static function getRoleChildrenForm($name)
    {
        $r = AuthItem::getRole($name);
        if (empty($r) or $r === null)
            return false;
        $f = new self();
        $f->name = $r->name;
        $f->description = $r->description;
        $f->type = $r->type;
        $f->isNewRecord = false;
        $f->childrenRoles = AuthItem::getRoleChildrenAsArray($r);
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

    /**
     *
     */
    public function savePermissions()
    {
        $parent = AuthItem::getRole($this->name);
        $children = array_values(Yii::$app->request->post('AuthItemForm')['children']['permissions']);
        $permissions = AuthItem::getRolePermissionsAsArray($parent);
        $new = array_diff($children, $permissions);
        $delete = array_diff($permissions, $children);
        foreach ($new as $n){
            AuthItem::addPermission($parent,$n);
        }
        AuthItem::removePermissions($parent, $delete);
        return true;
    }

    public function saveChildren($c)
    {
        $parent = AuthItem::getRole($this->name);
        $children = isset($c) ? $c : [];
        $children_roles = AuthItem::getRoleChildrenAsArray($parent);
        $new = array_diff($children, $children_roles);
        $delete = array_diff($children_roles, $children);
        foreach ($new as $n){
            AuthItem::addChildRole($parent, $n);
        }
        AuthItem::removeChildrenRoles($parent, $delete);
        return true;
    }
}