<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "header".
 *
 * @property int $id
 * @property string $tradenet_mailbox_id
 * @property string $declarant_name
 * @property string $cr_uei_no
 * @property string $job_number
 * @property string $message_type
 * @property int $declaration_type
 * @property string $previous_permit_no
 * @property string $import_data
 * @property int $cargo_pack_type
 * @property int $inward_transport_mode
 * @property int $bg_indicator
 * @property int $supply_indicator
 * @property int $ref_documents
 * @property string $reference1
 * @property string $reference2
 * @property string $reference3
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Header extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'header';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['tradenet_mailbox_id', 'declarant_name', 'cr_uei_no', 'job_number', 'message_type', 'declaration_type'], 'required'],
			[['declaration_type', 'cargo_pack_type', 'inward_transport_mode', 'bg_indicator', 'supply_indicator', 'ref_documents', 'CB', 'UB', 'status'], 'integer'],
			[['DOC', 'DOU'], 'safe'],
			[['tradenet_mailbox_id', 'declarant_name', 'cr_uei_no', 'job_number', 'message_type', 'previous_permit_no', 'reference1', 'reference2', 'reference3'], 'string', 'max' => 200],
//            [['import_data'], 'string', 'max' => 100],
		    [['import_data'], 'required', 'on' => 'create'],
			[['import_data'], 'file', 'extensions' => 'png, jpg, jpeg, gif, bmp, pdf, doc, docx'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'tradenet_mailbox_id' => 'Tradenet Mailbox ID',
		    'declarant_name' => 'Declarant Name',
		    'cr_uei_no' => 'Cr Uei No',
		    'job_number' => 'Job Number',
		    'message_type' => 'Message Type',
		    'declaration_type' => 'Declaration Type',
		    'previous_permit_no' => 'Previous Permit No',
		    'import_data' => 'Import Containers & items form previous permit',
		    'cargo_pack_type' => 'Cargo Pack Type',
		    'inward_transport_mode' => 'Inward Transport Mode',
		    'bg_indicator' => 'Bg Indicator',
		    'supply_indicator' => 'Supply Indicator',
		    'ref_documents' => 'Ref Documents',
		    'reference1' => 'Reference1',
		    'reference2' => 'Reference2',
		    'reference3' => 'Reference3',
		    'CB' => 'Cb',
		    'UB' => 'Ub',
		    'DOC' => 'Doc',
		    'DOU' => 'Dou',
		    'status' => 'Status',
		];
	}

}
