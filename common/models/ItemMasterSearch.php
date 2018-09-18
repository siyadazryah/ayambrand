<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ItemMaster;

/**
 * ItemMasterSearch represents the model behind the search form about `common\models\ItemMaster`.
 */
class ItemMasterSearch extends ItemMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_of_orgin', 'CB', 'UB', 'status'], 'integer'],
            [['code', 'name', 'description', 'brand', 'sku_net_weight', 'weight', 'DOC', 'DOU'], 'safe'],
            [['unit_price'], 'number'],
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
        $query = ItemMaster::find();

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
            'country_of_orgin' => $this->country_of_orgin,
            'unit_price' => $this->unit_price,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'sku_net_weight', $this->sku_net_weight])
            ->andFilterWhere(['like', 'weight', $this->weight]);

        return $dataProvider;
    }
}
