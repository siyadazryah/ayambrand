<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_master".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property int $country_of_orgin
 * @property string $brand
 * @property string $sku_net_weight
 * @property string $unit_price
 * @property string $weight
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class ItemMaster extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'item_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['description'], 'string'],
            [['country_of_orgin', 'CB', 'UB', 'status'], 'integer'],
            [['unit_price'], 'number'],
            [['DOC', 'DOU'], 'safe'],
            [['code', 'name', 'brand', 'sku_net_weight', 'weight'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'country_of_orgin' => 'Country Of Orgin',
            'brand' => 'Brand',
            'sku_net_weight' => 'Sku Net Weight',
            'unit_price' => 'Unit Price',
            'weight' => 'Weight',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

}
