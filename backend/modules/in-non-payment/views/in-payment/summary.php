<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

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
                <?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 9]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="summary-form form-inline">

                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'no_of_items')->textInput(['readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'total_cif_value')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'cif_fob_value')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'total_outer_pack')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'total_gross_weight')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'total_gst_amount')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'excise_duty_amount')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'customs_duty_amount')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>   
                                    <?= $form->field($model, 'other_tax_amount')->textInput(['maxlength' => true, 'readonly'=> true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'amount_payable')->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
                                    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

                                </div>
                            </div>


                            <div class="form-group action-btn-right">
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success']) ?>
                            </div>


                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



