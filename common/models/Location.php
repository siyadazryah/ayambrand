<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $location_name
 * @property string $location_code
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Location extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['location_name', 'location_code'], 'required'],
            [['location_code'], 'unique'],
            [['location_name', 'location_code'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'location_name' => 'Location Name',
            'location_code' => 'Location Code',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }
    public static function findlocation($id){
        $location = Location::findOne($id);
        return $location;
    }

}
