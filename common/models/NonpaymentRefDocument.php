<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nonpayment_ref_document".
 *
 * @property int $id
 * @property int $header_id
 * @property int $doc_type
 * @property string $file_name
 * @property string $file
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property NonpaymentHeader $header
 */
class NonpaymentRefDocument extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'nonpayment_ref_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'doc_type', 'CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['file_name'], 'string', 'max' => 200],
            [['file'], 'string', 'max' => 100],
            [['header_id'], 'exist', 'skipOnError' => true, 'targetClass' => NonpaymentHeader::className(), 'targetAttribute' => ['header_id' => 'id']],
            [['file'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'doc, docx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'doc_type' => 'Doc Type',
            'file_name' => 'File Name',
            'file' => 'File',
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
