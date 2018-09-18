<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "agents".
 *
 * @property int $id
 * @property string $code
 * @property int $agent_type
 * @property string $name1
 * @property string $name2
 * @property string $cr_uei
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Agents extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'agents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['code', 'agent_type', 'name1', 'name2', 'cr_uei'], 'required'],
            [['agent_type', 'CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['code', 'cr_uei'], 'unique'],
            [['code', 'name1', 'name2', 'cr_uei'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'agent_type' => 'Agent Type',
            'name1' => 'Name1',
            'name2' => 'Name2',
            'cr_uei' => 'CR UEI',
            'CB' => 'CB',
            'UB' => 'UB',
            'DOC' => 'DOC',
            'DOU' => 'DOU',
            'status' => 'Status',
        ];
    }
    public static function findagent($id){
        $agent = Agents::findOne($id);
        return $agent;
    }

}
