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
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <input type="hidden" id="item-item_id" class="form-control itemcode_field" name="Item[item_id]" value= "">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="item-item_code">Inhouse Item Code</label>
                                    <input type="text" id="item-item_code" class="form-control" value= "" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-item_code"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Description</label>
                                    <textarea id="item-description" class="form-control itemcode_field" ></textarea>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Country Of Origin</label>
                                    <input type="text" id="item-country_origin" class="form-control itemcode_field" readonly="readonly" name="country_origin" value= "" autocomplete="off">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>  
                                    <label class="control-label" for="party-declarant_id">Brand</label>
                                    <input type="text" id="item-brand" class="form-control itemcode_field" readonly="readonly" name="brand" value= "" autocomplete="off">
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
                            <div class="row">
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
                                        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>   
                                            <?= $form->field($model, 'cif_fob_value')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
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
                            <div class="row">
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
<script>
    jQuery('#cargo-release_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.release_field').val('');
        } else {
            locationdropdown($(this).val(), 'search-release', 'search-keyword-release_code', 'release_field');
        }
    });
    $('body').on('click', '.search-release', function () {
        var id = $(this).attr('id');
        findlocation(id, 'cargo-release_');
    });
    jQuery('#cargo-receipt_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.receipt_field').val('');
        } else {
            locationdropdown($(this).val(), 'search-receipt', 'search-keyword-receipt_code', 'release_field');
        }
    });
    $('body').on('click', '.search-receipt', function () {
        var id = $(this).attr('id');
        findlocation(id, 'cargo-receipt_');
    });
    /********************/
    function findlocation(id, dropdown) {
        jQuery.ajax({
            url: homeUrl + 'inpayment/in-payment/search-location',
            type: "POST",
            data: {id: id},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    $('#' + dropdown + 'id').val($data.id);
                    $('#' + dropdown + 'location').val($data.location_name);
                    $('#' + dropdown + 'code').val($data.location_code);
                    jQuery('.search-keyword-dropdown').html('');
                }

            }
        });
    }
    function locationdropdown(keyword, dropdown, searchplace, emptyfield) {
        jQuery.ajax({
            url: homeUrl + 'inpayment/in-payment/search-locationkeyword',
            type: "POST",
            data: {keyword: keyword, dropdown: dropdown},
            success: function (data) {
                if (data === '') {
                    $('.' + emptyfield).val('');
                } else {
                    jQuery('.' + searchplace).html(data);
                }
            },
        });
    }
</script>



