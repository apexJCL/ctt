<?php

namespace backend\models;

use common\models\AuthItemForm;
use Yii;
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
 * @property AuthItem[] $parents
 */
class AuthItem extends \yii\db\ActiveRecord
{

    const ROLE = 1;
    const PERMISSION = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
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
     * @return Role
     */
    public static function getRole($name){
        return self::findAuth(self::ROLE)->where(['name' => $name])->one();
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
}
