<?php

namespace common\models;

use Yii;
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
        // Primero asignamos el archivo que se subió
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
            return $this->profilePicture->saveAs(Yii::getAlias('@common') . DIRECTORY_SEPARATOR . self::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->id. '.' . $this->profilePicture->extension);
        } else return false;
    }

    public function deletePicture()
    {
        $baseUrl = Yii::getAlias('@common') . DIRECTORY_SEPARATOR . self::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->id;
        if (file_exists($baseUrl . self::JPG))
            return unlink($baseUrl . self::JPG);
        elseif (file_exists($baseUrl . self::PNG))
            return unlink($baseUrl . self::PNG);
    }
}
