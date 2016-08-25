<?php

namespace common\models;

use Yii;

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
}
