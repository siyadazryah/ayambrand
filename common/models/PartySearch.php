<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Party;

/**
 * PartySearch represents the model behind the search form about `common\models\Party`.
 */
class PartySearch extends Party
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'header_id', 'declarant_id', 'importer_id', 'frieght_forwarder_id', 'inward_agent_id', 'claimant_party_id', 'CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
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
        $query = Party::find();

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
            'declarant_id' => $this->declarant_id,
            'importer_id' => $this->importer_id,
            'frieght_forwarder_id' => $this->frieght_forwarder_id,
            'inward_agent_id' => $this->inward_agent_id,
            'claimant_party_id' => $this->claimant_party_id,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
