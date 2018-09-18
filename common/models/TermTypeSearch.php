<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TermType;

/**
 * TermTypeSearch represents the model behind the search form about `common\models\TermType`.
 */
class TermTypeSearch extends TermType {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'CB', 'UB', 'status'], 'integer'],
            [['term_name', 'code', 'DOC', 'DOU'], 'safe'],
            [['freight_charge', 'insurance_charge'], 'number'],
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
        $query = TermType::find();

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
            'freight_charge' => $this->freight_charge,
            'insurance_charge' => $this->insurance_charge,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'term_name', $this->term_name])
                ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }

}
