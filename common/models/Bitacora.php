<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "bitacora".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $accion
 * @property integer $user_id
 * @property string $tabla
 * @property string $ip
 *
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

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['fecha']
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Registers a new action
     *
     * @param $tableName
     * @return bool
     */
    public static function register($tableName)
    {
        $t = new self();
        $t->tabla = $tableName;
        $t->accion = Yii::$app->requestedAction->id;
        $t->ip = Yii::$app->request->getUserIP();
        $t->user_id = Yii::$app->user->id;
        return $t->validate() && $t->save();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accion', 'user_id', 'tabla'], 'required'],
            [['fecha'], 'safe'],
            [['user_id'], 'integer'],
            [['accion', 'tabla'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Date'),
            'accion' => Yii::t('app', 'Action'),
            'user_id' => Yii::t('app', 'User ID'),
            'tabla' => Yii::t('app', 'Table'),
            'ip' => Yii::t('app', 'IP'),
        ];
    }

}
