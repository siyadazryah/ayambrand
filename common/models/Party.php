<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "party".
 *
 * @property int $id
 * @property int $header_id
 * @property int $declarant_id
 * @property int $importer_id
 * @property int $frieght_forwarder_id
 * @property int $inward_agent_id
 * @property int $claimant_party_id
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property Header $header
 */
class Party extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'party';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'declarant_id', 'importer_id'], 'required'],
            [['header_id', 'declarant_id', 'importer_id', 'frieght_forwarder_id', 'inward_agent_id', 'claimant_party_id', 'CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['header_id'], 'exist', 'skipOnError' => true, 'targetClass' => Header::className(), 'targetAttribute' => ['header_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'declarant_id' => 'Declarant ID',
            'importer_id' => 'Importer ID',
            'frieght_forwarder_id' => 'Frieght Forwarder ID',
            'inward_agent_id' => 'Inward Agent ID',
            'claimant_party_id' => 'Claimant Party ID',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeader() {
        return $this->hasOne(Header::className(), ['id' => 'header_id']);
    }

}
