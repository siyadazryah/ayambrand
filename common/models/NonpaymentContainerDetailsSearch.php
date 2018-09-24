<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NonpaymentContainerDetails;

/**
 * NonpaymentContainerDetailsSearch represents the model behind the search form about `common\models\NonpaymentContainerDetails`.
 */
class NonpaymentContainerDetailsSearch extends NonpaymentContainerDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'header_id', 'cargo_id', 'size_type', 'CB', 'UB', 'status'], 'integer'],
            [['container_no', 'weight', 'seal_no', 'DOC', 'DOU'], 'safe'],
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
        $query = NonpaymentContainerDetails::find();

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
            'cargo_id' => $this->cargo_id,
            'size_type' => $this->size_type,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'container_no', $this->container_no])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'seal_no', $this->seal_no]);

        return $dataProvider;
    }
}
