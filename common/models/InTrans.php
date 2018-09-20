<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "in_trans".
 *
 * @property int $id
 * @property int $header_id
 * @property int $mode
 * @property string $arrival_date
 * @property int $loading_port
 * @property string $coveyance_ref_no
 * @property string $transport_identifier
 * @property string $ocean_bill_landing_no
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class InTrans extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'in_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'mode', 'loading_port', 'CB', 'UB', 'status'], 'integer'],
            [['arrival_date', 'DOC', 'DOU'], 'safe'],
            [['coveyance_ref_no', 'transport_identifier', 'ocean_bill_landing_no'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'mode' => 'Mode',
            'arrival_date' => 'Arrival Date',
            'loading_port' => 'Loading Port',
            'coveyance_ref_no' => 'Conveyance reference number(voyage number/Flight Number)',
            'transport_identifier' => 'Transport Identifier(vessel Name/Aircraft Registraion Number)',
            'ocean_bill_landing_no' => 'Ocean Bill Landing Number',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

    public function getHeader() {
        return $this->hasOne(Header::className(), ['id' => 'header_id']);
    }

}
