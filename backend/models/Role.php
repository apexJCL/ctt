<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $name
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['role_id' => 'id']);
    }
}
