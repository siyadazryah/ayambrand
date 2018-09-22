<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "outward_container_details".
 *
 * @property int $id
 * @property int $header_id
 * @property int $cargo_id
 * @property string $container_no
 * @property int $size_type
 * @property string $weight
 * @property string $seal_no
 * @property int $CB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class OutwardContainerDetails extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'outward_container_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'cargo_id', 'size_type', 'CB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['container_no', 'weight', 'seal_no'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'header_id' => 'Header ID',
            'cargo_id' => 'Cargo ID',
            'container_no' => 'Container No',
            'size_type' => 'Size Type',
            'weight' => 'Weight',
            'seal_no' => 'Seal No',
            'CB' => 'C B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

    public static function conter_details($header_id, $id) {
        $size = count(Yii::$app->request->post()['OutwardContainerDetails']['container_no']);
        for ($i = 0; $i < $size; $i++) {
            $container_model = new OutwardContainerDetails();
            $container_model->header_id = $header_id;
            $container_model->cargo_id = $id;
            $container_model->container_no = Yii::$app->request->post()['OutwardContainerDetails']['container_no'][$i];
            $container_model->size_type = Yii::$app->request->post()['OutwardContainerDetails']['size_type'][$i];
            $container_model->weight = Yii::$app->request->post()['OutwardContainerDetails']['weight'][$i];
            $container_model->seal_no = Yii::$app->request->post()['OutwardContainerDetails']['seal_no'][$i];
            Yii::$app->SetValues->Attributes($container_model) && $container_model->save();
        }
    }

}
