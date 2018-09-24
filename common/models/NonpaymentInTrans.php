<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nonpayment_in_trans".
 *
 * @property int $id
 * @property int $header_id
 * @property int $mode '1' => 'Sea', '2' => 'Road', '3' => 'Air'
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
 *
 * @property NonpaymentHeader $header
 */
class NonpaymentInTrans extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'nonpayment_in_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'mode', 'loading_port', 'CB', 'UB', 'status'], 'integer'],
            [['arrival_date', 'DOC', 'DOU'], 'safe'],
            [['coveyance_ref_no', 'transport_identifier', 'ocean_bill_landing_no'], 'string', 'max' => 200],
            [['header_id'], 'exist', 'skipOnError' => true, 'targetClass' => NonpaymentHeader::className(), 'targetAttribute' => ['header_id' => 'id']],
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
            'coveyance_ref_no' => 'Coveyance Ref No',
            'transport_identifier' => 'Transport Identifier',
            'ocean_bill_landing_no' => 'Ocean Bill Landing No',
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
        return $this->hasOne(NonpaymentHeader::className(), ['id' => 'header_id']);
    }

}
