<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Header;

/**
 * HeaderSearch represents the model behind the search form about `common\models\Header`.
 */
class HeaderSearch extends Header {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'declaration_type', 'cargo_pack_type', 'inward_transport_mode', 'bg_indicator', 'supply_indicator', 'ref_documents', 'CB', 'UB', 'status'], 'integer'],
            [['tradenet_mailbox_id', 'declarant_name', 'cr_uei_no', 'job_number', 'message_type', 'previous_permit_no', 'import_data', 'reference1', 'reference2', 'reference3', 'DOC', 'DOU'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Header::find();

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
            'declaration_type' => $this->declaration_type,
            'cargo_pack_type' => $this->cargo_pack_type,
            'inward_transport_mode' => $this->inward_transport_mode,
            'bg_indicator' => $this->bg_indicator,
            'supply_indicator' => $this->supply_indicator,
            'ref_documents' => $this->ref_documents,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tradenet_mailbox_id', $this->tradenet_mailbox_id])
                ->andFilterWhere(['like', 'declarant_name', $this->declarant_name])
                ->andFilterWhere(['like', 'cr_uei_no', $this->cr_uei_no])
                ->andFilterWhere(['like', 'job_number', $this->job_number])
                ->andFilterWhere(['like', 'message_type', $this->message_type])
                ->andFilterWhere(['like', 'previous_permit_no', $this->previous_permit_no])
                ->andFilterWhere(['like', 'import_data', $this->import_data])
                ->andFilterWhere(['like', 'reference1', $this->reference1])
                ->andFilterWhere(['like', 'reference2', $this->reference2])
                ->andFilterWhere(['like', 'reference3', $this->reference3]);

        return $dataProvider;
    }

}
