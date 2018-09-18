<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $id
 * @property string $size_name
 * @property string $code
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Size extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['size_name', 'code'], 'required'],
            [['code'], 'unique'],
            [['size_name', 'code'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'size_name' => 'Size Name',
            'code' => 'Code',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

}
