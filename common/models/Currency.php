<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $currency_name
 * @property string $currency_code
 * @property string $country
 * @property string $exchange_rate
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Currency extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['currency_name', 'currency_code', 'exchange_rate'], 'required'],
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['currency_name', 'currency_code', 'country', 'exchange_rate'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'currency_name' => 'Currency Name',
            'currency_code' => 'Currency Code',
            'country' => 'Country',
            'exchange_rate' => 'Exchange Rate',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

}
