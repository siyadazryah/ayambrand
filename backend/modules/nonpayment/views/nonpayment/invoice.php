<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Agents;
use common\models\ClaimantParty;
use kartik\date\DatePicker;
use common\models\Location;
use common\models\Size;
use yii\grid\GridView;
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
                <?= Html::a('<i class="fa fa-th-list"></i><span> Outward Declarations</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

            </div>
            <div class="panel-body">
                <?= common\components\OutwardTabWidget::widget(['id' => $id, 'step' => 6]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <!--<h3 class="heading">Invoice</h3>-->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#">Invoice Details</a></li>
                                <li><?= Html::a('Invoice Summary', ['invoice-summary', 'id' => $id]) ?></li>
                            </ul>
                            <?php $form = ActiveForm::begin(); ?>
                            <span class="main-title-span">Invoice Details</span>
                            <div class="row row-padng-top">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'invoice_no')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?=
                                    $form->field($model, 'invoice_date')->widget(DatePicker::classname(), [
                                        'type' => DatePicker::TYPE_INPUT,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                ]])->label('Invoice Date');
                                    ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'term_type')->dropDownList(ArrayHelper::map(common\models\TermType::find()->all(), 'id', 'code'), ['prompt' => 'select']) ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="outwardinvoice-type_name"></label>
                                    <input type="text" id="outwardinvoice-term_type_name" class="form-control" value= "" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-ad_valorem_indicator"></label>
                                    <?= $form->field($model, 'ad_valorem_indicator')->checkbox(); ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-duty_rate_indicator"></label>
                                    <?= $form->field($model, 'duty_rate_indicator')->checkbox(); ?>

                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'importer_id')->dropDownList(ArrayHelper::map(common\models\Agents::find()->where(['agent_type' => 2])->all(), 'id', 'name1'), ['prompt' => 'select']) ?>
                                </div>
                            </div>
                            <span class="main-title-span">Supplier Manufacture Party</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->manufacturer_id)) {
                                    $declarant = Agents::findagent($model->manufacturer_id);
                                }
                                ?>
                                <input type="hidden" id="invoice-manufacturer_id" class="form-control manufacturer_field" name="OutwardInvoice[manufacturer_id]" value= "<?= !empty($model->manufacturer_id) ? $model->manufacturer_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-manufacture">Code<span class="caret"></span></label>
                                    <input type="text" id="invoice-manufacturer_code" class="form-control" name="code1" value= "<?= !empty($declarant->code) ? $declarant->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-manufacturer"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-manufacture">Name1</label>
                                    <input type="text" id="invoice-manufacturer_name1" class="form-control manufacturer_field" name="name1" readonly="readonly" value= "<?= !empty($declarant->name1) ? $declarant->name1 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-manufacture">Name2</label>
                                    <input type="text" id="invoice-manufacturer_name2" class="form-control manufacturer_field" name="name2" readonly="readonly" value= "<?= !empty($declarant->name2) ? $declarant->name2 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-manufacture">CR UEI</label>
                                    <input type="text" id="invoice-manufacturer_cruei" class="form-control manufacturer_field" name="cruei" readonly="readonly" value= "<?= !empty($declarant->cr_uei) ? $declarant->cr_uei : '' ?>">
                                </div>

                            </div>

                            <span class="main-title-span">Freight Calculation</span>
                            <div class="row row-padng-top">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'invoice_amount')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'freight_amount')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="invoice-calculate"></label>
                                    <button type="button" class="btn-primary outward_invoice_calculate">Calculate</button>
                                </div>
                            </div>
                            <span class="main-title-span">Invoice Charge</span>
                            <div class="appointment-service-create row-padng-top">
                                <table class="table table-bordered table-responsive" id="invoice_details">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Charge %</th>
                                            <th>Currency</th>
                                            <th>Exchange Rate</th>
                                            <th>Amount</th>
                                            <th>Amount($)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="container_details_body">

                                        <tr>
                                            <td>Total Invoice</td>
                                            <td></td>
                                            <td>
                                                <select id="total_invoice" class="form-control currency" name="">
                                                    <option >Select</option>
                                                    <?php
                                                    $currencys = common\models\Currency::find()->where(['status' => 1])->all();
                                                    if ($currencys) {
                                                        foreach ($currencys as $currency) {
                                                            ?>
                                                            <option value="<?= $currency->id ?>"><?= $currency->currency_code ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" value=""  class="form-control total_invoice_exchange" readonly="readonly"></td>
                                            <td><input type="text" value=""  class="form-control total_invoice_ex_amount"></td>
                                            <td><input type="text" value=""  class="form-control total_invoice_amount" id="outwardinvoice_amount" readonly="readonly"></td>
                                        </tr>
                                        <tr>
                                            <td>Other Taxable Charge</td>
                                            <td><input type="text"  class="form-control" value=""></td>
                                            <td>
                                                <select id="other_tax" class="form-control currency" name="">
                                                    <option >Select</option>
                                                    <?php
                                                    $currencys = common\models\Currency::find()->where(['status' => 1])->all();
                                                    if ($currencys) {
                                                        foreach ($currencys as $currency) {
                                                            ?>
                                                            <option value="<?= $currency->id ?>"><?= $currency->currency_code ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" value=""  class="form-control other_tax_exchange" readonly="readonly"></td>
                                            <td><input type="text" value=""  class="form-control other_tax_ex_amount"></td>
                                            <td><input type="text" value=""  class="form-control other_tax_amount" name="outwardinvoice[other_tax_amount]" id="outwardinvoice-other_tax" readonly="readonly"></td>
                                        </tr>
                                        <tr>
                                            <td>Freight Charge</td>
                                            <td><input type="text"  class="form-control" value=""></td>
                                            <td>
                                                <select id="freight_charge" class="form-control currency" name="">
                                                    <option >Select</option>
                                                    <?php
                                                    $currencys = common\models\Currency::find()->where(['status' => 1])->all();
                                                    if ($currencys) {
                                                        foreach ($currencys as $currency) {
                                                            ?>
                                                            <option value="<?= $currency->id ?>"><?= $currency->currency_code ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" value=""  class="form-control freight_charge_exchange" readonly="readonly"></td>
                                            <td><input type="text" value=""  class="form-control freight_charge_ex_amount"></td>
                                            <td><input type="text" value=""  class="form-control freight_charge_amount" name="outwardinvoice[freight_charge]" id="outwardinvoice_freight" readonly="readonly"></td>
                                        </tr>
                                        <tr>
                                            <td>Insurance Charge</td>
                                            <td><input type="text"  class="form-control" value=""></td>
                                            <td>
                                                <select id="insurance_charge" class="form-control currency" name="">
                                                    <option >Select</option>
                                                    <?php
                                                    $currencys = common\models\Currency::find()->where(['status' => 1])->all();
                                                    if ($currencys) {
                                                        foreach ($currencys as $currency) {
                                                            ?>
                                                            <option value="<?= $currency->id ?>"><?= $currency->currency_code ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" value="" class="form-control insurance_charge_exchange" readonly="readonly"></td>
                                            <td><input type="text" value=""  class="form-control insurance_charge_ex_amount"></td>
                                            <td><input type="text" value=""  class="form-control insurance_charge_amount" name="outwardinvoice[insurance_charge]" id="outwardinvoice_insurance" readonly="readonly"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Cost, Insurance and Freight</td>
                                            <td><input type="text" value="" name="outwardinvoice[total_amount]" id="outwardinvoice-total_amount" class="form-control" readonly="readonly"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">GST</td>
                                            <td><input type="text" value="" name="outwardinvoice[gst_amount]" class="form-control" readonly="readonly"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                <div class="form-group">
                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'update', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; ']) ?>
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
    $('.outward_invoice_calculate').on('click', function () {
        var invoice = $('#outwardinvoice-invoice_amount').val();
        var freight = $('#outwardinvoice-freight_amount').val();
        if (invoice === '') {
            invoice = 0;
        }
        if (freight === '') {
            freight = 0;
        }
        var invoice_freight = $('#outwardinvoice_freight').val();
        if (invoice_freight === '') {
            invoice_freight = 0;
        }
        var invoice_insurance = $('#outwardinvoice_insurance').val();
        if (invoice_insurance === '') {
            invoice_insurance = 0;
        }
        var other_tax = $('#outwardinvoice-other_tax').val();
        if (other_tax === '') {
            other_tax = 0;
        }
        var total = parseFloat(invoice) + parseFloat(freight);
        var total_amount = total + parseFloat(invoice_freight) + parseFloat(invoice_insurance) + parseFloat(other_tax);
        $('#outwardinvoice_amount').val(total);
        $('#outwardinvoice-total_amount').val(total_amount);
    });
    $('.currency').on('change', function () {
        var id = $(this).attr('id');
        var val = $(this).val();
        var amount = $('.' + id + '_amount').val();
        jQuery.ajax({
            url: homeUrl + 'ajax/exchange-rate',
            type: "POST",
            data: {val: val},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === 'success') {
                    $('.' + id + '_exchange').val($data.rate);
                    console.log(amount);
                    var ex_rate = parseFloat(amount) * parseFloat($data.rate);
                    $('.' + id + '_ex_amount').val(ex_rate);
                }
            },
        });
    });
</script>



