<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `common\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'header_id', 'term_type', 'ad_valorem_indicator', 'duty_rate_indicator', 'importer_id', 'manufacturer_id', 'CB', 'UB', 'status'], 'integer'],
            [['invoice_no', 'invoice_date', 'DOC', 'DOU'], 'safe'],
            [['invoice_amount', 'freight_amount', 'total_amount', 'other_tax_amount', 'freight_charge', 'insurance_charge', 'gst_amount'], 'number'],
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
        $query = Invoice::find();

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
            'invoice_date' => $this->invoice_date,
            'term_type' => $this->term_type,
            'ad_valorem_indicator' => $this->ad_valorem_indicator,
            'duty_rate_indicator' => $this->duty_rate_indicator,
            'importer_id' => $this->importer_id,
            'manufacturer_id' => $this->manufacturer_id,
            'invoice_amount' => $this->invoice_amount,
            'freight_amount' => $this->freight_amount,
            'total_amount' => $this->total_amount,
            'other_tax_amount' => $this->other_tax_amount,
            'freight_charge' => $this->freight_charge,
            'insurance_charge' => $this->insurance_charge,
            'gst_amount' => $this->gst_amount,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'invoice_no', $this->invoice_no]);

        return $dataProvider;
    }
}
