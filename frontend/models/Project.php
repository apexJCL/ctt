<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $lugar
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $client_id
 *
 * @property Client $client
 * @property Quotation[] $quotations
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'lugar', 'client_id'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['client_id'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['lugar'], 'string', 'max' => 200],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
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
            'lugar' => Yii::t('app', 'Lugar'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'client_id' => Yii::t('app', 'Client ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotations()
    {
        return $this->hasMany(Quotation::className(), ['project_id' => 'id']);
    }
}
