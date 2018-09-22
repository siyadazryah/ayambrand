<?php

namespace common\models;

use Yii;
use common\models\OutwardItem;
use common\models\ItemMaster;

/**
 * This is the model class for table "outward_summary".
 *
 * @property int $id
 * @property int $header_id
 * @property int $no_of_items
 * @property string $total_cif_value
 * @property string $cif_fob_value
 * @property string $total_outer_pack
 * @property string $total_gross_weight
 * @property string $total_gst_amount
 * @property string $excise_duty_amount
 * @property string $customs_duty_amount
 * @property string $other_tax_amount
 * @property string $amount_payable
 * @property string $remarks
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property OutwardHeader $header
 */
class OutwardSummary extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'outward_summary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id'], 'required'],
            [['header_id', 'no_of_items', 'CB', 'UB', 'status'], 'integer'],
            [['total_cif_value', 'cif_fob_value', 'total_gst_amount', 'excise_duty_amount', 'customs_duty_amount', 'other_tax_amount', 'amount_payable'], 'number'],
            [['remarks'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['total_outer_pack', 'total_gross_weight'], 'string', 'max' => 200],
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
            'no_of_items' => 'No Of Items',
            'total_cif_value' => 'Total Cif Value',
            'cif_fob_value' => 'Cif Fob Value',
            'total_outer_pack' => 'Total Outer Pack',
            'total_gross_weight' => 'Total Gross Weight',
            'total_gst_amount' => 'Total Gst Amount',
            'excise_duty_amount' => 'Excise Duty Amount',
            'customs_duty_amount' => 'Customs Duty Amount',
            'other_tax_amount' => 'Other Tax Amount',
            'amount_payable' => 'Amount Payable',
            'remarks' => 'Remarks',
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

    public static function findGross($id) {
        $total = 0;
        $items = OutwardItem::find()->where(['status' => 1, 'header_id' => $id])->all();
        if ($items) {
            foreach ($items as $item) {
                $master = ItemMaster::findOne($item->item_id)->weight;
                $total = $total + $master;
            }
        }
        return $total;
    }

}
