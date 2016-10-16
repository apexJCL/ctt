<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\Query;

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
 * @property integer $item_id
 *
 * @property ItemDescription $accessoryOf
 * @property ItemDescription[] $itemDescriptions
 * @property User $createdBy
 * @property User $updatedBy
 * @property Item $item
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
            [['accessory_of', 'sale', 'created_by', 'updated_by', 'item_id'], 'integer'],
            [['acquisition_price', 'sell_price', 'rent_price'], 'number'],
            [['item_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['serial_number'], 'string', 'max' => 255],
            [['accessory_of'], 'exist', 'skipOnError' => true, 'targetClass' => ItemDescription::className(), 'targetAttribute' => ['accessory_of' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'attribute' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by']
                ],
                'value' => Yii::$app->user->id
            ]
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
            'item_id' => Yii::t('app', 'Item ID'),
        ];
    }

    /**
     * Returns one ItemDescription object by ID
     *
     * @param $id
     * @return array|null|ActiveRecord
     */
    public static function findById($id)
    {
        return self::find()->where(['id' => $id])->one();
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    public static function ajaxSearch($q, $id)
    {
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, serial_number AS text')
                ->from('item_description')
                ->where(['like', 'serial_number', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => self::findById($id)->name];
        }
        return $out;
    }
}
