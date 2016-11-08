<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project_status".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $color
 *
 * @property Project[] $projects
 */
class ProjectStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_status';
    }

    public static function dropdown()
    {
        $status = self::find()->all();
        $r = [];
        /* @var $s ProjectStatus */
        foreach ($status as $s) {
            $r[$s->id] = $s->descripcion;
        }
        return $r;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['status_id' => 'id']);
    }
}
