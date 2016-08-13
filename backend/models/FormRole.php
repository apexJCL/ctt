<?php

namespace backend\models;

use common\models\RbacRole;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;

class FormRole extends Model
{
    public $name;
    public $description;
    public $isNewRecord = true;
    public $children = [];

    /**
     * @param $role RbacRole
     * @return FormRole
     */
    public static function newRole($role)
    {
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

    public function getChildren($name){
        return Yii::$app->authManager->getChildren($name);
    }

}