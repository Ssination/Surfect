<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Addresses;

/**
 * AddressesSearch represents the model behind the search form of `app\models\Addresses`.
 */
class AddressesSearch extends Addresses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id', 'country_id'], 'integer'],
            [['address_name', 'city', 'zip_code', 'district', 'email'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Addresses::find();

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
            'address_id' => $this->address_id,
            'zip_code' => $this->zip_code,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'address_name', $this->address_name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
