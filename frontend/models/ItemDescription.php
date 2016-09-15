<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "item_description".
 *
 * @property integer $id
 * @property integer $accessory_of
 * @property string $serial_number
 * @property string $acquisition_price
 * @property string $sell_price
 * @property string $rent_price
 * @property integer $sale
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property ItemDescription $accessoryOf
 * @property ItemDescription[] $itemDescriptions
 * @property User $createdBy
 * @property User $updatedBy
 */
class ItemDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accessory_of', 'sale', 'created_by', 'updated_by'], 'integer'],
            [['acquisition_price', 'sell_price', 'rent_price'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['serial_number'], 'string', 'max' => 255],
            [['accessory_of'], 'exist', 'skipOnError' => true, 'targetClass' => ItemDescription::className(), 'targetAttribute' => ['accessory_of' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accessory_of' => Yii::t('app', 'Accessory Of'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'acquisition_price' => Yii::t('app', 'Acquisition Price'),
            'sell_price' => Yii::t('app', 'Sell Price'),
            'rent_price' => Yii::t('app', 'Rent Price'),
            'sale' => Yii::t('app', 'Sale'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessoryOf()
    {
        return $this->hasOne(ItemDescription::className(), ['id' => 'accessory_of']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemDescriptions()
    {
        return $this->hasMany(ItemDescription::className(), ['accessory_of' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}