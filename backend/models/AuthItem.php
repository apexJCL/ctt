<?php

namespace backend\models;

use common\models\AuthItemForm;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\rbac\Assignment;
use yii\rbac\Permission;
use yii\rbac\Role;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $childrenRoles
 * @property AuthItem[] $parents
 */
class AuthItem extends ActiveRecord
{

    const ROLE = 1;
    const PERMISSION = 2;
    public $actualChildren = self::ROLE;
    public $children = [];
    public $childrenRoles = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    public static function getRoleWithRoleChildren($name, $type)
    {
        $t = self::getRole($name);
        $t->children = $t->getRoleChildrenAsArray($t->name);
        return $t;
    }

    public static function addPermission($parent, $permission)
    {
        $item = self::getPermission($permission);
        if (empty($item) or !$item instanceof AuthItem)
            return false;
        return Yii::$app->authManager->addChild($parent, $item);
    }

    public static function removePermissions($parent, $permissions)
    {
        foreach ($permissions as $permission){
            $item = self::getPermission($permission);
            Yii::$app->authManager->removeChild($parent, $item);
        }
    }


    public static function addChildRole($parent, $role)
    {
        $item = self::getRole($role);
        if (empty($item) or !$item instanceof AuthItem)
            return false;
        return Yii::$app->authManager->addChild($parent, $item);
    }

    public static function removeChildrenRoles($parent, $children_roles)
    {
        foreach ($children_roles as $child){
            $item = self::getPermission($child);
            Yii::$app->authManager->removeChild($parent, $item);
        }
    }

    public static function getRolesAutocomplete($name)
    {
        $r = self::getRoles();
        $t = [];
        foreach ($r as $role){
            if ($role->name != $name) // Quick hack, TODO: fix this hack
                $t[$role->name] = null;
        }
        return $t;
    }

    public static function getPermissionsAutocomplete($name)
    {
        $p = self::getPermissions();
        $t = [];
        foreach ($p as $permission){
            if ($permission->name != $name)
                $t[$permission->name] = null;
        }
        return $t;
    }

    public static function getChildrenAutocomplete($parent, $type)
    {
        if ($type == AuthItem::ROLE)
            return self::getRolesAutocomplete($parent);
        elseif  ($type == AuthItem::PERMISSION)
            return self::getPermissionsAutocomplete($parent);
        else return null;
    }

    /**
     * Assigns a role to the given user
     *
     * @param $id int User id
     * @param $roleName string Name of the role
     * @return Assignment
     */
    public static function assignRole($id, $roleName)
    {
        $r = self::getRole($roleName);
        return Yii::$app->authManager->assign($r, $id);
    }

    /**
     * Revokes a role from the given user
     *
     * @param $id
     * @param $roleName
     * @return bool
     */
    public static function removeRole($id, $roleName)
    {
        $r = self::getRole($roleName);
        return Yii::$app->authManager->revoke($r, $id);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['rule_name'], 'exist', 'skipOnError' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(AuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren0()
    {
        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'child'])->viaTable('auth_item_child', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'parent'])->viaTable('auth_item_child', ['child' => 'name']);
    }

    /**
     * Returns a role by his name
     * @param $name
     * @return AuthItem
     */
    public static function getRole($name){
        /* @var $r AuthItem */
        $r = self::findAuth(self::ROLE)->where(['name' => $name])->one();
        $r->children = $r->getPermissionsAsArray();
        return $r;
    }

    /**
     * Returns a permission by his name
     *
     * @param $name
     * @return Permission
     */
    public static function getPermission($name)
    {
        return self::findAuth(self::PERMISSION)->where(['name' => $name])->one();
    }

    /**
     * Returns all roles
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRoles()
    {
        return self::findAuth(self::ROLE)->all();
    }

    /**
     * Returns all permissions
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPermissions()
    {
        return self::findAuth(self::PERMISSION)->all();
    }

    /**
     * Finds Auth Item by type
     *
     * @param $type
     * @return \yii\db\ActiveQuery
     */
    public static function findAuth($type)
    {
        return self::find()->where(['type' => $type]);
    }

    /**
     * Deletes a role
     *
     * @param $name
     * @return bool
     */
    public static function deleteRole($name)
    {
        $role = Yii::$app->authManager->getRole($name);
        return Yii::$app->authManager->remove($role);
    }

    /**
     * Deletes a permission
     *
     * @param $name
     * @return bool
     */
    public static function deletePermission($name)
    {
        $permission = Yii::$app->authManager->getPermission($name);
        return Yii::$app->authManager->remove($permission);
    }

    /**
     * Saves a role
     *
     * @param $form AuthItemForm
     * @return bool
     */
    public static function saveRole($form)
    {
        $role = Yii::$app->authManager->getRole($form->name);
        if (empty($role)) {
            if ($form->validate()) {
                $auth = Yii::$app->authManager;
                $role = $auth->createRole($form->name);
                $role->description = $form->description;
                return $auth->add($role);
            } else return false;
        } else {
            $role->name = $form->name;
            $role->description = $form->description;
            return Yii::$app->authManager->update($form->name, $role);
        }
    }


    /**
     * Saves a permission
     *
     * @param $form AuthItemForm
     * @return bool
     */
    public static function savePermission($form)
    {
        $p = self::getPermission($form->name);
        if  (empty($p)){
            if ($form->validate()){
                $auth = Yii::$app->authManager;
                $p = $auth->createPermission($form->name);
                $p->description = $form->description;
                return $auth->add($p);
            } else return false;
        } else {
            $p->name = $form->name;
            $p->description = $form->description;
            return Yii::$app->authManager->update($form->name, $p);
        }
    }

    /**
     * @param $role AuthItem
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRolePermissions($role)
    {
        return $role->getChildren()->where(['type' => self::PERMISSION])->all();
    }

    /**
     *
     * Returns an arary containing only names for permission roles
     */
    private function getPermissionsAsArray()
    {
        $c = Yii::$app->authManager->getPermissionsByRole($this->name);
        $r = [];
        foreach ($c as $child){
            array_push($r, $child->name);
        }
        return $r;
    }

    /**
     * Returns all permissions assigned to a role, in an array
     *
     * @param $role AuthItem
     * @return array
     */
    public static function getRolePermissionsAsArray($role)
    {
        $c = $role->getChildren()->where(['type' => self::PERMISSION])->select(['name'])->asArray()->all();
        $r = [];
        foreach ($c as $child){
            array_push($r, $child['name']);
        }
        return $r;
    }

    /**
     * Returns a role children roles, from where it inherits permissions
     *
     * @param $role string
     * @return array
     */
    public static function getRoleChildrenAsArray($role)
    {
        $c =  Yii::$app->authManager->getChildren($role);
        $r = [];
        foreach ($c as $child) {
            if ($child->type == self::ROLE)
                array_push($r, $child->name);
        }
        return $r;
    }

    /**
     * Returns all assignments for a given user
     *
     * @param $id int User id
     * @return array []
     */
    public static function getAssignments($id)
    {
        $a = Yii::$app->authManager->getAssignments($id);
        $r = [];
        foreach ($a as $item)
            array_push($r, $item->roleName);
        return $r;
    }

    public function saveChildrenRoles($c)
    {
        $parent = self::getRole($this->name);
        $children = isset($c) ? $c : [];
        $children_roles = self::getRoleChildrenAsArray($parent->name);
        $new = array_diff($children, $children_roles);
        $delete = array_diff($children_roles, $children);
        foreach ($new as $n){
            self::addChildRole($parent, $n);
        }
        self::removeChildrenRoles($parent, $delete);
        return true;
    }
}
