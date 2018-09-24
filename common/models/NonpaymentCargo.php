<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nonpayment_cargo".
 *
 * @property int $id
 * @property int $header_id
 * @property int $release_location
 * @property int $receipt_location
 * @property string $date
 * @property string $container_detail
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property NonpaymentHeader $header
 */
class NonpaymentCargo extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'nonpayment_cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id'], 'required'],
            [['header_id', 'release_location', 'receipt_location', 'CB', 'UB', 'status'], 'integer'],
            [['date', 'DOC', 'DOU'], 'safe'],
            [['container_detail'], 'string', 'max' => 100],
            [['header_id'], 'exist', 'skipOnError' => true, 'targetClass' => NonpaymentHeader::className(), 'targetAttribute' => ['header_id' => 'id']],
            [['container_detail'], 'required', 'on' => 'create'],
            [['container_detail'], 'file', 'extensions' => 'xlsx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'release_location' => 'Release Location',
            'receipt_location' => 'Receipt Location',
            'date' => 'Date',
            'container_detail' => 'Container Detail',
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
