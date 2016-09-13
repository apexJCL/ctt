<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ItemDescription;

/**
 * ItemDescriptionSearch represents the model behind the search form about `frontend\models\ItemDescription`.
 */
class ItemDescriptionSearch extends ItemDescription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'accessory_of', 'sale', 'created_by', 'updated_by'], 'integer'],
            [['serial_number', 'created_at', 'updated_at'], 'safe'],
            [['acquisition_price', 'sell_price', 'rent_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ItemDescription::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'accessory_of' => $this->accessory_of,
            'acquisition_price' => $this->acquisition_price,
            'sell_price' => $this->sell_price,
            'rent_price' => $this->rent_price,
            'sale' => $this->sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number]);

        return $dataProvider;
    }
}
