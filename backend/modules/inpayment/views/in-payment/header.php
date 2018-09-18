<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Header */

$this->title = 'Header';
$this->params['breadcrumbs'][] = ['label' => 'Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <!--<h3 class="panel-title"><?Html::encode($this->title) ?></h3>-->
                <?= Html::a('<i class="fa-th-list"></i><span> Manage Header</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

            </div>
            <div class="panel-body">
                <?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 1]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <h3 class="heading">Header</h3>

                            <?php $form = ActiveForm::begin(); ?>
                            <span>Job Info</span>
                            <div class="row">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'tradenet_mailbox_id')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'declarant_name')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'cr_uei_no')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <?= $form->field($model, 'job_number')->textInput(['maxlength' => true]) ?>

                                </div>
                            </div>
                            <span>Declaration Type</span>
                            <div class="row">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'message_type')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'> 
                                    <?= $form->field($model, 'declaration_type')->dropDownList(['1' => 'GST', '2' => 'VAT', '3' => 'CGST']) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'previous_permit_no')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  

                                    <?= $form->field($model, 'import_data')->fileInput() ?>

                                </div>
                            </div>
                            <span>Declaration Info</span>
                            <div class="row">
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'> 
                                    <?= $form->field($model, 'cargo_pack_type')->dropDownList(['1' => 'Containirised']) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>  
                                    <?= $form->field($model, 'inward_transport_mode')->dropDownList(['1' => 'Sea', '2' => 'Road', '3' => 'Air']) ?>

                                </div>
                            </div>
                            <span>Job Details</span>
                            <div class="row">
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'> 
                                    <?= $form->field($model, 'bg_indicator')->dropDownList(['1' => 'Sea', '2' => 'Road', '3' => 'Air']) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'> 
                                    <label class="control-label" for="header-supply_indicator"></label>
                                    <?= $form->field($model, 'supply_indicator')->checkbox(); ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="header-ref_documents">Other Documents (Tick to show hidden Tab)</label>
                                    <?= $form->field($model, 'ref_documents')->checkbox(); ?>

                                </div>
                            </div>
                            <span>Additional Recipients</span>
                            <div class="row">

                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'reference1')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'reference2')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'reference3')->textInput(['maxlength' => true]) ?>

                                </div>
                            </div>
                            <div class='col-md-4 col-sm-6 col-xs-12' style="float:right;">
                                <div class="form-group" style="float: right;">
                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

