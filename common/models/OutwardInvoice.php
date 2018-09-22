<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "outward_invoice".
 *
 * @property int $id
 * @property int $header_id
 * @property string $invoice_no
 * @property string $invoice_date
 * @property int $term_type
 * @property int $ad_valorem_indicator
 * @property int $duty_rate_indicator
 * @property int $importer_id
 * @property int $manufacturer_id
 * @property string $invoice_amount
 * @property string $freight_amount
 * @property string $total_amount
 * @property string $other_tax_amount
 * @property string $freight_charge
 * @property string $insurance_charge
 * @property string $gst_amount
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property OutwardHeader $header
 */
class OutwardInvoice extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'outward_invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'invoice_no'], 'required'],
            [['header_id', 'term_type', 'ad_valorem_indicator', 'duty_rate_indicator', 'importer_id', 'manufacturer_id', 'CB', 'UB', 'status'], 'integer'],
            [['invoice_date', 'DOC', 'DOU'], 'safe'],
            [['invoice_amount', 'freight_amount', 'total_amount', 'other_tax_amount', 'freight_charge', 'insurance_charge', 'gst_amount'], 'number'],
            [['invoice_no'], 'string', 'max' => 200],
            [['header_id'], 'exist', 'skipOnError' => true, 'targetClass' => OutwardHeader::className(), 'targetAttribute' => ['header_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'invoice_no' => 'Invoice No',
            'invoice_date' => 'Invoice Date',
            'term_type' => 'Term Type',
            'ad_valorem_indicator' => 'Ad Valorem Indicator',
            'duty_rate_indicator' => 'Duty Rate Indicator',
            'importer_id' => 'Importer ID',
            'manufacturer_id' => 'Manufacturer ID',
            'invoice_amount' => 'Invoice Amount',
            'freight_amount' => 'Freight Amount',
            'total_amount' => 'Total Amount',
            'other_tax_amount' => 'Other Tax Amount',
            'freight_charge' => 'Freight Charge',
            'insurance_charge' => 'Insurance Charge',
            'gst_amount' => 'GST Amount',
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
        return $this->hasOne(OutwardHeader::className(), ['id' => 'header_id']);
    }

}
