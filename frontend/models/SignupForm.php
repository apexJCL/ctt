<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nombre', 'required'],
            ['nombre', 'string', 'max' => 50],

            ['apellido_paterno', 'required'],
            ['apellido_paterno', 'string', 'max' => 50],

            ['apellido_materno', 'required'],
            ['apellido_materno', 'string', 'max' => 50],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nombre = $this->nombre;
        $user->apellido_paterno = $this->apellido_paterno;
        $user->apellido_materno = $this->apellido_materno;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        echo '<pre>';
        return $user->save() ? $user : die(print_r($user->getErrors()));
    }
}
