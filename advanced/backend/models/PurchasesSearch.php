<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Purchases;

/**
 * PurchasesSearch represents the model behind the search form of `app\models\Purchases`.
 */
class PurchasesSearch extends Purchases
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_id', 'address_id', 'payment_id'], 'integer'],
            [['purchase_date', 'email'], 'safe'],
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
        $query = Purchases::find();

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
            'purchase_id' => $this->purchase_id,
            'purchase_date' => $this->purchase_date,
            'address_id' => $this->address_id,
            'payment_id' => $this->payment_id,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
