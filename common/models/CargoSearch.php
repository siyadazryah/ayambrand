<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cargo;

/**
 * CargoSearch represents the model behind the search form about `common\models\Cargo`.
 */
class CargoSearch extends Cargo {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'header_id', 'release_location', 'receipt_location', 'CB', 'UB', 'status'], 'integer'],
            [['date', 'container_detail', 'DOC', 'DOU'], 'safe'],
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
        $query = Cargo::find();

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
            'release_location' => $this->release_location,
            'receipt_location' => $this->receipt_location,
            'date' => $this->date,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'container_detail', $this->container_detail]);

        return $dataProvider;
    }

}
