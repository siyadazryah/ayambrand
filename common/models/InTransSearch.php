<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InTrans;

/**
 * InTransSearch represents the model behind the search form about `common\models\InTrans`.
 */
class InTransSearch extends InTrans {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'header_id', 'mode', 'loading_port', 'CB', 'UB', 'status'], 'integer'],
            [['arrival_date', 'coveyance_ref_no', 'transport_identifier', 'ocean_bill_landing_no', 'DOC', 'DOU'], 'safe'],
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
        $query = InTrans::find();

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
            'mode' => $this->mode,
            'arrival_date' => $this->arrival_date,
            'loading_port' => $this->loading_port,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'coveyance_ref_no', $this->coveyance_ref_no])
                ->andFilterWhere(['like', 'transport_identifier', $this->transport_identifier])
                ->andFilterWhere(['like', 'ocean_bill_landing_no', $this->ocean_bill_landing_no]);

        return $dataProvider;
    }

}
