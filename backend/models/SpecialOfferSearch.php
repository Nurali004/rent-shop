<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SpecialOffer;

/**
 * SpecialOfferSearch represents the model behind the search form of `common\models\SpecialOffer`.
 */
class SpecialOfferSearch extends SpecialOffer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'equipment_id', 'is_active'], 'integer'],
            [['old_price', 'new_price'], 'number'],
            [['updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = SpecialOffer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'equipment_id' => $this->equipment_id,
            'old_price' => $this->old_price,
            'new_price' => $this->new_price,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
