<?php
namespace common\models;

use backend\models\AuthItem;
use backend\models\Role;
use backend\models\Status;
use backend\models\UserType;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $user_type_id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $password write-only password
 * @property AuthItem[] $roles
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const JPG = '.jpg';
    const PNG = '.png';
    public $roles = [];
    public $new_password;

    /**
     * @var UploadedFile
     */
    public $profilePicture;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public static function getUserRoles($id)
    {
        $u = self::findIdentity($id);
        if (empty($u) || !isset($u))
            return false;
        $u->roles = AuthItem::getAssignments($u->id);
        return $u;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // Status
            ['status_id', 'default', 'value' => self::STATUS_ACTIVE],
            [['status_id'], 'in', 'range' => array_keys($this->getStatusList())],
            // Role
            ['role_id', 'default', 'value' => 10],
            [['role_id'], 'in', 'range' => array_keys($this->getRoleList())],
            // User type
            ['user_type_id', 'default', 'value' => 10],
            [['user_type_id'], 'in', 'range' => array_keys($this->getUserTypeList())],
            // Username
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 6, 'max' => 35],
            // Email
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            // Datos Personales
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 50],
            [['password_reset_token'], 'unique'],
            [['username', 'auth_key', 'password_hash', 'email', 'nombre', 'apellido_paterno'], 'required'],
            [['profilePicture'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, jpeg']
        ];
    }

    /* Your model attribute labels */
    public function attributeLabels()
    {
        return [
            /* Your other attribute labels */
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Returns the role ID for a the actual user
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public function getRoleName()
    {
        return $this->role ? $this->role->name : '-no role-';
    }

    /**
     * @return mixed
     */
    public function getRoleList()
    {
        $droptions = Role::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'name');
    }

    /**
     * Returns the user status
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * Returns the status of the user as text, -no status- if not present.
     *
     * @return string
     */
    public function getStatusName()
    {
        return $this->status ? $this->status->name : '-no status-';
    }

    /**
     * Returns a list of status
     *
     * @return array
     */
    public static function getStatusList()
    {
        $droptions = Status::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'name');
    }

    /**
     * Returns the user type of the actual user
     *
     * @return \yii\db\ActiveQuery
     *
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * Returns the name of the user type
     *
     * @return string
     */
    public function getUserTypeName()
    {
        return $this->userType ? $this->userType->user_type_name : '- no user type -';
    }

    /**
     * Returns a list of user types
     *
     * @return array
     */
    public function getUserTypeList()
    {
        $droptions = UserType::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_type_name');
    }

    public function getUserTypeId()
    {
        return $this->userType ? $this->userType->id : 'none';
    }

    /**
     * Uploads the user picture to the server in a specific subfolder
     * @return bool
     * @internal param $username
     */
    public function upload()
    {
        if (!empty($this->profilePicture) && isset($this->profilePicture)) {
            $this->deletePicture();
            return $this->profilePicture->saveAs(Yii::getAlias('@common') . '/users/' . $this->username . '.' . $this->profilePicture->extension);
        } else return false;
    }

    /**
     * Returns the url to the profile picture, or default if it does not exists
     */
    public function getProfilePicture()
    {
        $baseUrl = 'img/users/' . $this->username;
        return file_exists($baseUrl . self::JPG) ? '/' . $baseUrl . self::JPG : (
        file_exists($baseUrl . self::PNG) ? '/' . $baseUrl . self::PNG : '/img/default_avatar.jpg'
        );
    }

    public function deleteProfile()
    {
        $this->deletePicture();
        return $this->delete();
    }

    public function deletePicture()
    {
        $baseUrl = Yii::getAlias('@common') . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . $this->username;
        if (file_exists($baseUrl . self::JPG))
            return unlink($baseUrl . self::JPG);
        elseif (file_exists($baseUrl . self::PNG))
            return unlink($baseUrl . self::PNG);
    }

    public function getChildren()
    {
        return Yii::$app->authManager->getAssignments($this->id);
    }

    public function updatePassword($new_password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($new_password);
    }

    public function updateData()
    {
        $this->profilePicture = UploadedFile::getInstance($this, 'profilePicture');
        $this->new_password = Yii::$app->request->post()['User']['new_password'];
        if ($this->validate()) {
            // First, password
            if (!empty($this->new_password))
                $this->updatePassword($this->new_password);
            // Then we save
            $this->save();
            // Last but not least, profile picture
            return $this->upload();
        }
        return false;
    }

    /**
     * Signs user up.
     *
     * @return bool|User|null
     */
    public function signUp()
    {
        // Primero asignamos el archivo que se subió
        $this->profilePicture = UploadedFile::getInstance($this, 'profilePicture');
        // Luego la contraseña
        $this->new_password = Yii::$app->request->post()['User']['new_password'];
        $this->setPassword($this->new_password);
        $this->generateAuthKey();
        if ($this->save() && $this->validate()) {
            $this->upload();
            return $this;
        }
        return false;
    }

    /**
     * Iterates through an array and adds the roles,
     * if roles are missing from the received array,
     * those are deleted
     *
     * @param $roles [] string Role names
     * @return bool
     */
    public function manageRoles($roles)
    {
        $assigned = AuthItem::getAssignments($this->id);
        $new = array_diff($roles, $assigned);
        $delete = array_diff($assigned, $roles);
        foreach ($new as $n){
            AuthItem::assignRole($this->id, $n);
        }
        $this->removeRoles($delete);
        return true;
    }

    /**
     * Removes current user assignment with the given roles
     *
     * @param $assigned [] string Role Names
     * @return bool
     */
    private function removeRoles($assigned)
    {
        foreach ($assigned as $roleName)
            AuthItem::removeRole($this->id, $roleName);
        return true;
    }

    public static function hasRole($user_id, $role){
        $roles = Yii::$app->authManager->getRolesByUser($user_id);
        foreach ($roles as $r){
            if ($r->name === $role)
                return true;
        }
        return false;
    }

    public function canI($permission)
    {
        $p = Yii::$app->authManager->getPermission($permission);
        if (empty($p) or $p === null)
            return false;
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        if (in_array('root', array_keys($roles))) return true;
        foreach ($roles as $role){
            $permissions = Yii::$app->authManager->getPermissionsByRole($role->name);
            if (in_array($p, $permissions))
                return true;
        }
        return false;
    }
}
