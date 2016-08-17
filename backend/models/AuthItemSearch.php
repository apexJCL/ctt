<?php

namespace backend\models;

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

    public static function newRoleSearch()
    {
        $t = new self();
        $t->searchType = AuthItem::ROLE;
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
        $query = AuthItem::findAuth($this->searchType);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}