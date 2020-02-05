<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * StoreSearch represents the model behind the search form of `app\models\Products`.
 */
class StoreSearch extends Products
{
    public  $preco;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'stock', 'discount', 'category_id'], 'integer'],
            [['name', 'description', 'preco'], 'safe'],
            [['price'], 'number'],
            //[['desconto'], 'number'],

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
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //$this->desconto=$this->price-($this->price*$this->discount),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'price' => $this->price, //$this->price = $this->price - ($this->price * $this->discount)
            'stock' => $this->stock,
            'discount' => $this->discount,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }

}
