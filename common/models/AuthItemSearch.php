<?php

namespace common\models;

use app\models\AuthItem;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class AuthItemSearch extends AuthItem
{

    public $searchType;

    public static function newPermissionSearch()
    {
        $t = new self();
        $t->searchType = AuthItem::PERMISSION;
        return $t;
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AuthItem::find();

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
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'type', $this->searchType]);
        
        return $dataProvider;
    }
}