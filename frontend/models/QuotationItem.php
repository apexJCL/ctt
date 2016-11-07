<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "quotation_items".
 *
 * @property integer $id
 * @property integer $quotation_id
 * @property integer $item_description_id
 *
 * @property ItemDescription $itemDescription
 * @property Quotation $quotation
 */
class QuotationItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_id', 'item_description_id'], 'required'],
            [['quotation_id', 'item_description_id'], 'integer'],
            [['item_description_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemDescription::className(), 'targetAttribute' => ['item_description_id' => 'id']],
            [['quotation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quotation::className(), 'targetAttribute' => ['quotation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quotation_id' => Yii::t('app', 'Quotation ID'),
            'item_description_id' => Yii::t('app', 'Item Description ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemDescription()
    {
        return $this->hasOne(ItemDescription::className(), ['id' => 'item_description_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotation()
    {
        return $this->hasOne(Quotation::className(), ['id' => 'quotation_id']);
    }
}
