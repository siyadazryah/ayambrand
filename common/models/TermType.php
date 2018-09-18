<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "term_type".
 *
 * @property int $id
 * @property string $term_name
 * @property string $code
 * @property string $freight_charge
 * @property string $insurance_charge
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class TermType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'term_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_name', 'code'], 'required'],
            [['freight_charge','insurance_charge'], 'number'],
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['term_name', 'code'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'term_name' => 'Term Name',
            'code' => 'Code',
            'freight_charge' => 'Freight Charge',
            'insurance_charge' => 'Insurance Charge',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }
}
