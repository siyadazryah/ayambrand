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
                <?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 7]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <h3 class="heading">Item</h3>
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#">Item Details</a></li>
                                <li><?= Html::a('Item Summary', ['item-summary', 'id' => $id]) ?></li>
                            </ul>

                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <?php
                                if (!empty($model->item_id)) {
                                    $declarant = \common\models\ItemMaster::findone($model->item_id);
                                    $country = common\models\Country::findOne($declarant->country_of_orgin)->name;
                                }
                                ?>
                                <input type="hidden" id="item-item_id" class="form-control itemcode_field" name="Item[item_id]" value= "<?= !empty($model->item_id) ? $model->item_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="item-item_code">Inhouse Item Code<span class="caret"></span></label>
                                    <input type="text" id="item-item_code" class="form-control" value= "<?= !empty($declarant->code) ? $declarant->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-item_code"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <?= $form->field($model, 'description')->textarea(['rows' => '3']) ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Country Of Origin</label>
                                    <input type="text" id="item-country_origin" class="form-control itemcode_field" readonly="readonly" name="country_origin" value= "<?= !empty($declarant->country_of_orgin) ? $declarant->country_of_orgin : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Brand</label>
                                    <input type="text" id="item-brand" class="form-control itemcode_field" readonly="readonly" name="brand" value= "<?= !empty($declarant->brand) ? $declarant->brand : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" id="item-hs_id" class="form-control release_field" name="Item[hs_id]" value= "">
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="item-hs_code">HS Code</label>
                                    <input type="text" id="item-hs_code" class="form-control" value= "" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-hs_code"></div>
                                </div>

                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">HS Type</label>
                                    <input type="text" id="item-hs_type" class="form-control" name="hs_type" value= "">
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Duty Type</label>
                                    <input type="text" id="item-duty_type" class="form-control" name="duty_type" value= "">
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label"></label>
                                    <?= $form->field($model, 'dangerous_goods')->checkbox(); ?>
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label"></label>
                                    <?= $form->field($model, 'unbranded')->checkbox(); ?>
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row separation_item">
                                <div class='col-md-6'> 
                                    <span>Packing Description</span>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'outer_pack_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'outer_pack_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'in_pack_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'in_pack_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'inner_pack_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'inner_pack_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'inmost_pack_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'inmost_pack_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <span>Item Value</span>
                                    <div class="row">
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'item_invoice')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select']) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>
                                            <div class="form-group field-item-cif_fob_value">
                                                <label class="control-label" for="item-unit_price">Unit Price</label>
                                                <input type="text" id="item-unit_price" class="form-control" name="Item[unit_price]">
                                            </div>
                                        </div>
                                        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                            <label class="control-label" for="item-currency_list"></label>
                                            <button type="button" class="btn-dropbox" data-toggle="modal" data-target="#currencyModal">Currency</button>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'cif_fob_value')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>  
                                            <label class="control-label" for="item-unit_price"></label>
                                            <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal">Calculate</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row separation_item">
                                <div class='col-md-6'> 
                                    <span>Item Quantity</span>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'total_dutiable_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'total_dutiable_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'hs_qty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'hs_qty_unit')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select'])->label('Unit') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <span>Bill of Landing/Airway Bill</span>
                                    <div class="row">
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'hawb_obl')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row separation_item">
                                <div class='col-md-6'> 
                                    <span>Tariff</span>
                                    <div class="row">
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'preferential_code')->dropDownList(ArrayHelper::map(common\models\Size::find()->where(['status' => 1])->all(), 'id', 'size_name'), ['prompt' => 'select']) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'gst_percentage')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'gst_amount')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'excise_duty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'customs_duty')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <span>Lot Identification</span>
                                    <div class="row">
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'current_lot')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'previous_lot')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'marking')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>
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
<div class="modal fade item_calculator" id="myModal">
    <div class="modal-dialog item_calculator_modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">CIF/FOB Calculator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Invoice No</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>No Of Unit</td>
                        <td><input type="text" name="no_of_unit" class="item_no_unit"></td>
                    </tr>
                    <tr>
                        <td>Unit Price</td>
                        <td><input type="text" name="unit_price" class="item_unit_price"></td>
                    </tr>
                </table>
                <button type="button" class="btn-success item_find_calculation">Calculate</button>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="currencyModal">
    <div class="modal-dialog item_calculator_modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Help Menu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul>
                    <li><label>USD</label>:<label>1.355</label>:<label>Dollar</label></li>
                    <li><label>USD</label>:<label>1.355</label>:<label>Dollar</label></li>
                    <li><label>USD</label>:<label>1.355</label>:<label>Dollar</label></li>
                    <li><label>USD</label>:<label>1.355</label>:<label>Dollar</label></li>
                </ul>
<!--                <table class="table">
                    <tr>
                        <td>Invoice No</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>No Of Unit</td>
                        <td><input type="text" name="no_of_unit" class="item_no_unit"></td>
                    </tr>
                    <tr>
                        <td>Unit Price</td>
                        <td><input type="text" name="unit_price" class="item_unit_price"></td>
                    </tr>
                </table>-->
            </div>

        </div>
    </div>
</div>
<!--item-cif_fob_value-->
<script>
    $('.item_find_calculation').on('click', function () {
        var unit = $('.item_no_unit').val();
        var price = $('.item_unit_price').val();
        var total = parseFloat(unit) * parseFloat(price);
        $('#item-cif_fob_value').val(total);
        $('.item_no_unit').val('');
        $('.item_unit_price').val('');
        $('.item_calculator').modal('toggle');
    });
</script>



