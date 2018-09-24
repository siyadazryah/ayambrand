<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "claimant_party".
 *
 * @property int $id
 * @property string $name1
 * @property string $name2
 * @property string $cr_uei
 * @property string $claimant_name
 * @property string $claimant_id
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class ClaimantParty extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'claimant_party';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['name1', 'cr_uei', 'claimant_name', 'claimant_id'], 'required'],
			[['CB', 'UB', 'status'], 'integer'],
			[['DOC', 'DOU'], 'safe'],
			[['claimant_id'], 'unique'],
			[['name1', 'name2', 'cr_uei', 'claimant_name', 'claimant_id'], 'string', 'max' => 200],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'name1' => 'Name1',
		    'name2' => 'Name2',
		    'cr_uei' => 'CR UEI',
		    'claimant_name' => 'Claimant Name',
		    'claimant_id' => 'Claimant ID',
		    'CB' => 'CB',
		    'UB' => 'UB',
		    'DOC' => 'DOC',
		    'DOU' => 'DOU',
		    'status' => 'Status',
		];
	}

	public static function findclaimant($id) {
		$agent = ClaimantParty::findOne($id);
		return $agent;
	}

}
