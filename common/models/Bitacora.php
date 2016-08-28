<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $accion
 *
 * @property BitacoraDetalles[] $bitacoraDetalles
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['accion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'accion' => Yii::t('app', 'Accion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoraDetalles()
    {
        return $this->hasMany(BitacoraDetalles::className(), ['bitacora_id' => 'id']);
    }

    /**
     * Registers an event in the table
     *
     * @param $table
     * @return bool
     */
    public static function register($table)
    {
        $t = new self();
        $t->accion = Yii::$app->requestedAction->id;
        $t->fecha = date("Y-m-d H:i:s");
        if ($t->validate())
            $t->save();
        else
            return false;
        $td = new BitacoraDetalles();
        $td->bitacora_id = $t->id;
        $td->tabla = $table;
        $td->user_id = Yii::$app->user->id;
        return $td->validate() && $td->save();
    }
}
