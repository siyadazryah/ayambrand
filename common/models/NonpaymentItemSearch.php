<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NonpaymentItem;

/**
 * NonpaymentItemSearch represents the model behind the search form about `common\models\NonpaymentItem`.
 */
class NonpaymentItemSearch extends NonpaymentItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'header_id', 'item_id', 'hs_id', 'dangerous_goods', 'country_origin', 'unbranded', 'outer_pack_unit', 'in_pack_unit', 'inner_pack_unit', 'inmost_pack_unit', 'item_invoice', 'total_dutiable_unit', 'hs_qty_unit', 'preferential_code', 'marking', 'CB', 'UB', 'status'], 'integer'],
            [['description', 'model', 'hawb_obl', 'gst_percentage', 'current_lot', 'previous_lot', 'DOC', 'DOU'], 'safe'],
            [['item_no', 'outer_pack_qty', 'in_pack_qty', 'inner_pack_qty', 'inmost_pack_qty', 'cif_fob_value', 'total_dutiable_qty', 'hs_qty', 'gst_amount', 'excise_duty', 'customs_duty'], 'number'],
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
        $query = NonpaymentItem::find();

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
            'header_id' => $this->header_id,
            'item_id' => $this->item_id,
            'hs_id' => $this->hs_id,
            'item_no' => $this->item_no,
            'dangerous_goods' => $this->dangerous_goods,
            'country_origin' => $this->country_origin,
            'unbranded' => $this->unbranded,
            'outer_pack_qty' => $this->outer_pack_qty,
            'outer_pack_unit' => $this->outer_pack_unit,
            'in_pack_qty' => $this->in_pack_qty,
            'in_pack_unit' => $this->in_pack_unit,
            'inner_pack_qty' => $this->inner_pack_qty,
            'inner_pack_unit' => $this->inner_pack_unit,
            'inmost_pack_qty' => $this->inmost_pack_qty,
            'inmost_pack_unit' => $this->inmost_pack_unit,
            'item_invoice' => $this->item_invoice,
            'cif_fob_value' => $this->cif_fob_value,
            'total_dutiable_qty' => $this->total_dutiable_qty,
            'total_dutiable_unit' => $this->total_dutiable_unit,
            'hs_qty' => $this->hs_qty,
            'hs_qty_unit' => $this->hs_qty_unit,
            'preferential_code' => $this->preferential_code,
            'gst_amount' => $this->gst_amount,
            'excise_duty' => $this->excise_duty,
            'customs_duty' => $this->customs_duty,
            'marking' => $this->marking,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'hawb_obl', $this->hawb_obl])
            ->andFilterWhere(['like', 'gst_percentage', $this->gst_percentage])
            ->andFilterWhere(['like', 'current_lot', $this->current_lot])
            ->andFilterWhere(['like', 'previous_lot', $this->previous_lot]);

        return $dataProvider;
    }
}
