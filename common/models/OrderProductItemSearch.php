<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderProductItem;

/**
 * OrderProductItemSearch represents the model behind the search form of `common\models\OrderProductItem`.
 */
class OrderProductItemSearch extends OrderProductItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_product_id', 'product_id', 'title', 'price', 'count', 'total_count'], 'integer'],
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
        $query = OrderProductItem::find();

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
            'order_product_id' => $this->order_product_id,
            'product_id' => $this->product_id,
            'title' => $this->title,
            'price' => $this->price,
            'count' => $this->count,
            'total_count' => $this->total_count,
        ]);

        return $dataProvider;
    }
}
