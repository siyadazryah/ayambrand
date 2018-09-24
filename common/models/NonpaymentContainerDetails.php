<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nonpayment_container_details".
 *
 * @property int $id
 * @property int $header_id
 * @property int $cargo_id
 * @property string $container_no
 * @property int $size_type
 * @property string $weight
 * @property string $seal_no
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 *
 * @property OutwardCargo $cargo
 */
class NonpaymentContainerDetails extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'nonpayment_container_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['header_id', 'cargo_id', 'size_type', 'CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['container_no', 'weight', 'seal_no'], 'string', 'max' => 200],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => OutwardCargo::className(), 'targetAttribute' => ['cargo_id' => 'id']],
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
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo() {
        return $this->hasOne(OutwardCargo::className(), ['id' => 'cargo_id']);
    }

    public static function conter_details($header_id, $id) {
        $size = count(Yii::$app->request->post()['NonpaymentContainerDetails']['container_no']);
        for ($i = 0; $i < $size; $i++) {
            $container_model = new NonpaymentContainerDetails();
            $container_model->header_id = $header_id;
            $container_model->cargo_id = $id;
            $container_model->container_no = Yii::$app->request->post()['NonpaymentContainerDetails']['container_no'][$i];
            $container_model->size_type = Yii::$app->request->post()['NonpaymentContainerDetails']['size_type'][$i];
            $container_model->weight = Yii::$app->request->post()['NonpaymentContainerDetails']['weight'][$i];
            $container_model->seal_no = Yii::$app->request->post()['NonpaymentContainerDetails']['seal_no'][$i];
            Yii::$app->SetValues->Attributes($container_model) && $container_model->save();
        }
    }

}
