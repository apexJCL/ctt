<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bitacora_detalles".
 *
 * @property integer $id
 * @property integer $bitacora_id
 * @property integer $user_id
 * @property string $tabla
 *
 * @property Bitacora $bitacora
 */
class BitacoraDetalles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora_detalles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bitacora_id', 'user_id'], 'integer'],
            [['tabla'], 'string', 'max' => 50],
            [['bitacora_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bitacora::className(), 'targetAttribute' => ['bitacora_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bitacora_id' => Yii::t('app', 'Bitacora ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'tabla' => Yii::t('app', 'Tabla'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacora()
    {
        return $this->hasOne(Bitacora::className(), ['id' => 'bitacora_id']);
    }
}
