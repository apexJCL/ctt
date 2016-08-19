<?php

namespace common\models;

use backend\models\AuthItem;
use Yii;
use yii\base\Model;
use yii\rbac\Role;

class AuthItemForm extends Model
{
    public $name;
    public $type;
    public $description;
    public $isNewRecord = true;
    public $children;

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
        $f->children = AuthItem::getRolePermissionsAsArray($f->name);
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
        $childrens = Yii::$app->request->post('AuthItemForm')['children']['permissions'];
        /**
         * @var $r Role
         *
         * First we add the new permissions
         */
        $permissions = AuthItem::getRolePermissionsAsArray($this->name);
        for ($i = 0; $i < sizeof($childrens); $i++){
            if (!in_array($childrens[$i], $permissions))
                AuthItem::addPermission($parent, $childrens[$i]);
            $permissions = array_splice($permissions, $i, 1); // Remove previously assigned permissions from list
        }
        // If permissions list still has elements, it means these permissions have been revoked, so we delete them
        if (!empty($permissions) && sizeof($permissions) >= 1)
            AuthItem::removePermissions($parent, $permissions);
        return true;
    }
}