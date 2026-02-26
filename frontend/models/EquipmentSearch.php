<?php

namespace frontend\models;

use common\models\Equipment;
use yii\data\ActiveDataProvider;

class EquipmentSearch extends Equipment
{
    public function search($search)
    {
        $query = Equipment::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($search);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'like', 'name', $this->name,
        ]);

        return $dataProvider;
        
    }

}