<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "container_details".
 *
 * @property int $id
 * @property int $header_id
 * @property int $cargo_id
 * @property string $container_no
 * @property int $size_type
 * @property string $weight
 * @property int $seal_no
 * @property int $CB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class ContainerDetails extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'container_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'cargo_id', 'size_type', 'CB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['container_no', 'weight'], 'string', 'max' => 200],
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
        $size = count(Yii::$app->request->post()['ContainerDetails']['container_no']);
        for ($i = 0; $i < $size; $i++) {
            $container_model = new ContainerDetails();
            $container_model->header_id = $header_id;
            $container_model->cargo_id = $id;
            $container_model->container_no = Yii::$app->request->post()['ContainerDetails']['container_no'][$i];
            $container_model->size_type = Yii::$app->request->post()['ContainerDetails']['size_type'][$i];
            $container_model->weight = Yii::$app->request->post()['ContainerDetails']['weight'][$i];
            $container_model->seal_no = Yii::$app->request->post()['ContainerDetails']['seal_no'][$i];
            $container_model->save();
        }
    }

}
