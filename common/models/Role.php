<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

class Role extends Model
{
    public $name;
    public $description;
    public $isNewRecord = true;
    public $children = [];

    /**
     * @param $name
     * @return Role
     */
    public static function newRole($name)
    {
        $role = Yii::$app->authManager->getRole($name);
        $t = new self();
        $t->name = $role->name;
        $t->description = $role->description;
        return $t;
    }

    public static function getRole($name)
    {
        $r = Yii::$app->authManager->getRole($name);
        if (empty($r) or $r === null)
            return false;
        $f = new self();
        $f->name = $r->name;
        $f->description = $r->description;
        $f->isNewRecord = false;
        $f->children = Yii::$app->authManager->getChildren($r->name);
        return $f;
    }

    /**
     * Returns all existing roles as a json representation (names only)
     *
     * @return string
     */
    public static function getRolesAsJson()
    {
        $roles = Yii::$app->authManager->getRoles();
        $t = [];
        foreach ($roles as $r){
            $t[$r->name] = null;
        }
        return json_encode($t);
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
        /**
         * @var $role Role
         */
        $role = Yii::$app->authManager->getRole($this->name);
        if (empty($role)) {
            if ($this->validate()) {
                $auth = Yii::$app->authManager;
                $role = $auth->createRole($this->name);
                $role->description = $this->description;
                return $auth->add($role);
            } else return false;
        } else {
            $role->name = $this->name;
            $role->description = $this->description;
            return Yii::$app->authManager->update($this->name, $role);
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description')
        ];
    }

    /**
     * Returns a role children items
     *
     * @param $name
     * @return \yii\rbac\Item[]
     */
    public function getChildren($name){
        return Yii::$app->authManager->getChildren($name);
    }

    /**
     * Deletes a role
     *
     * @param $name
     * @return bool
     */
    public static function delete($name){
        $role = Yii::$app->authManager->getRole($name);
        return Yii::$app->authManager->remove($role);
    }

    /**
     * Returns a Role Array Provider for GridView Widget
     *
     * @return ArrayDataProvider
     */
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

    /**
     * Returns all roles
     *
     * @return \yii\rbac\Role[]
     */
    public static function getRoles(){
        return Yii::$app->authManager->getRoles();
    }

    /**
     * Returns the Role ID (if exists)
     *
     * @param $name
     * @return mixed
     */
    public static function getRoleId($name)
    {
        return Yii::$app->authManager->getRole($name)->id;
    }
}