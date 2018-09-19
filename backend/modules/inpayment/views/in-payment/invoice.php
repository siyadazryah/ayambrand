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
				<?= Html::a('<i class="fa-th-list"></i><span> Manage Header</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

			</div>
			<div class="panel-body">
				<?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 6]) ?>
				<div class="panel-body"><div class="header-create">
						<div class="header-form form-inline">
							<!--<h3 class="heading">Invoice</h3>-->
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
									<label class="control-label" for="invoice-type_name"></label>
									<input type="text" id="invoice-term_type_name" class="form-control" value= "" readonly="readonly">
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
								<input type="hidden" id="invoice-manufacturer_id" class="form-control manufacturer_field" name="Invoice[manufacturer_id]" value= "<?= !empty($model->manufacturer_id) ? $model->manufacturer_id : '' ?>">
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<label class="control-label" for="invoice-manufacture">Code</label>
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
												<select id="" class="form-control" name="">
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
											<td><input type="text" value=""  class="form-control" readonly="readonly"></td>
											<td><input type="text" value=""  class="form-control"></td>
											<td><input type="text" value=""  class="form-control" readonly="readonly"></td>
										</tr>
										<tr>
											<td>Other Taxable Charge</td>
											<td><input type="text"  class="form-control" value=""></td>
											<td>
												<select id="" class="form-control" name="">
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
											<td><input type="text" value=""  class="form-control" readonly="readonly"></td>
											<td><input type="text" value=""  class="form-control"></td>
											<td><input type="text" value=""  class="form-control" readonly="readonly"></td>
										</tr>
										<tr>
											<td>Freight Charge</td>
											<td><input type="text"  class="form-control" value=""></td>
											<td>
												<select id="" class="form-control" name="">
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
											<td><input type="text" value=""  class="form-control" readonly="readonly"></td>
											<td><input type="text" value=""  class="form-control"></td>
											<td><input type="text" value=""  class="form-control" id="invoice_freight" readonly="readonly"></td>
										</tr>
										<tr>
											<td>Insurance Charge</td>
											<td><input type="text"  class="form-control" value=""></td>
											<td>
												<select id="" class="form-control" name="">
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
											<td><input type="text" value="" class="form-control" readonly="readonly"></td>
											<td><input type="text" value=""  class="form-control"></td>
											<td><input type="text" value=""  class="form-control" id="invoice_insurance" readonly="readonly"></td>
										</tr>
										<tr>
											<td>Cost, Insurance and Freight</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>GST</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
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



