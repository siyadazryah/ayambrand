<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nonpayment_item".
 *
 * @property int $id
 * @property int $header_id
 * @property int $item_id
 * @property string $description
 * @property int $hs_id
 * @property string $item_no
 * @property int $dangerous_goods
 * @property int $country_origin
 * @property int $unbranded
 * @property string $model
 * @property string $outer_pack_qty
 * @property int $outer_pack_unit
 * @property string $in_pack_qty
 * @property int $in_pack_unit
 * @property string $inner_pack_qty
 * @property int $inner_pack_unit
 * @property string $inmost_pack_qty
 * @property int $inmost_pack_unit
 * @property int $item_invoice
 * @property string $cif_fob_value
 * @property string $total_dutiable_qty
 * @property int $total_dutiable_unit
 * @property string $hs_qty
 * @property int $hs_qty_unit
 * @property string $hawb_obl
 * @property int $preferential_code
 * @property string $gst_percentage
 * @property string $gst_amount
 * @property string $excise_duty
 * @property string $customs_duty
 * @property string $current_lot
 * @property string $previous_lot
 * @property int $marking
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property NonpaymentHeader $header
 */
class NonpaymentItem extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'nonpayment_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'item_id', 'hs_id', 'dangerous_goods', 'country_origin', 'unbranded', 'outer_pack_unit', 'in_pack_unit', 'inner_pack_unit', 'inmost_pack_unit', 'item_invoice', 'total_dutiable_unit', 'hs_qty_unit', 'preferential_code', 'marking', 'CB', 'UB', 'status'], 'integer'],
            [['description'], 'string'],
            [['item_no', 'outer_pack_qty', 'in_pack_qty', 'inner_pack_qty', 'inmost_pack_qty', 'cif_fob_value', 'total_dutiable_qty', 'hs_qty', 'gst_amount', 'excise_duty', 'customs_duty'], 'number'],
            [['DOC', 'DOU'], 'safe'],
            [['model', 'hawb_obl', 'current_lot', 'previous_lot'], 'string', 'max' => 200],
            [['gst_percentage'], 'string', 'max' => 100],
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
            'item_id' => 'Item ID',
            'description' => 'Description',
            'hs_id' => 'Hs ID',
            'item_no' => 'Item No',
            'dangerous_goods' => 'Dangerous Goods',
            'country_origin' => 'Country Origin',
            'unbranded' => 'Unbranded',
            'model' => 'Model',
            'outer_pack_qty' => 'Outer Pack Qty',
            'outer_pack_unit' => 'Outer Pack Unit',
            'in_pack_qty' => 'In Pack Qty',
            'in_pack_unit' => 'In Pack Unit',
            'inner_pack_qty' => 'Inner Pack Qty',
            'inner_pack_unit' => 'Inner Pack Unit',
            'inmost_pack_qty' => 'Inmost Pack Qty',
            'inmost_pack_unit' => 'Inmost Pack Unit',
            'item_invoice' => 'Item Invoice',
            'cif_fob_value' => 'Cif Fob Value',
            'total_dutiable_qty' => 'Total Dutiable Qty',
            'total_dutiable_unit' => 'Total Dutiable Unit',
            'hs_qty' => 'Hs Qty',
            'hs_qty_unit' => 'Hs Qty Unit',
            'hawb_obl' => 'Hawb Obl',
            'preferential_code' => 'Preferential Code',
            'gst_percentage' => 'Gst Percentage',
            'gst_amount' => 'Gst Amount',
            'excise_duty' => 'Excise Duty',
            'customs_duty' => 'Customs Duty',
            'current_lot' => 'Current Lot',
            'previous_lot' => 'Previous Lot',
            'marking' => 'Marking',
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
