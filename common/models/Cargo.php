<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $id
 * @property int $header_id
 * @property int $release_location
 * @property int $reciept_location
 * @property string $date
 * @property string $container_detail
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Cargo extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'cargo';
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

    public function getHeader() {
        return $this->hasOne(Header::className(), ['id' => 'header_id']);
    }

}
