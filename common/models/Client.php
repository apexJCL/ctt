<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $email
 */
class Client extends \yii\db\ActiveRecord
{
    const JPG = '.jpg';
    const PNG = '.png';
    const PICTURE_PATH = 'clients';
    /**
     * @var UploadedFile
     */
    public $profilePicture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido_paterno', 'apellido_materno', 'email'], 'required'],
            [['nombre', 'apellido_paterno', 'apellido_materno', 'email'], 'string', 'max' => 50],
        ];
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
            'attribute' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by']
                ],
                'value' => Yii::$app->user->id
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido_paterno' => Yii::t('app', 'Apellido Paterno'),
            'apellido_materno' => Yii::t('app', 'Apellido Materno'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * Returns the url to the profile picture, or default if it does not exists
     */
    public function getProfilePicture()
    {
        $baseUrl = 'img/clients/' . $this->id;
        return file_exists($baseUrl . self::JPG) ? '/' . $baseUrl . self::JPG : (
        file_exists($baseUrl . self::PNG) ? '/' . $baseUrl . self::PNG : '/img/default_avatar.jpg'
        );
    }

    public function create()
    {
        $this->profilePicture = UploadedFile::getInstance($this, 'profilePicture');
        if ($this->save() && $this->validate()) {
            $this->upload();
            return $this;
        }
        return false;
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
            return $this->profilePicture->saveAs(
                'img' .
                DIRECTORY_SEPARATOR .
                self::PICTURE_PATH .
                DIRECTORY_SEPARATOR .
                $this->id .
                '.' .
                $this->profilePicture->extension);
        } else return false;
    }

    public function deletePicture()
    {
        $baseUrl = 'img' . DIRECTORY_SEPARATOR . self::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->id;
        if (file_exists($baseUrl . self::JPG))
            return unlink($baseUrl . self::JPG);
        elseif (file_exists($baseUrl . self::PNG))
            return unlink($baseUrl . self::PNG);
    }
}
