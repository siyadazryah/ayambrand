<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NonpaymentSummary;

/**
 * NonpaymentSummarySearch represents the model behind the search form about `common\models\NonpaymentSummary`.
 */
class NonpaymentSummarySearch extends NonpaymentSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'header_id', 'no_of_items', 'CB', 'UB', 'status'], 'integer'],
            [['total_cif_value', 'cif_fob_value', 'total_gst_amount', 'excise_duty_amount', 'customs_duty_amount', 'other_tax_amount', 'amount_payable'], 'number'],
            [['total_outer_pack', 'total_gross_weight', 'remarks', 'DOC', 'DOU'], 'safe'],
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
        $query = NonpaymentSummary::find();

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
            'no_of_items' => $this->no_of_items,
            'total_cif_value' => $this->total_cif_value,
            'cif_fob_value' => $this->cif_fob_value,
            'total_gst_amount' => $this->total_gst_amount,
            'excise_duty_amount' => $this->excise_duty_amount,
            'customs_duty_amount' => $this->customs_duty_amount,
            'other_tax_amount' => $this->other_tax_amount,
            'amount_payable' => $this->amount_payable,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'total_outer_pack', $this->total_outer_pack])
            ->andFilterWhere(['like', 'total_gross_weight', $this->total_gross_weight])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
