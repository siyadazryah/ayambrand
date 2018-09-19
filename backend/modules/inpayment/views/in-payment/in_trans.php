<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\models\Location;
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
				<?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 4]) ?>
				<div class="panel-body"><div class="header-create">
						<div class="header-form form-inline">
							<!--<h3 class="heading">In Trans</h3>-->

							<?php $form = ActiveForm::begin(); ?>
							<span class="main-title-span">Transport Details</span>
							<div class="row row-padng-top">
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<?= $form->field($model, 'mode')->dropDownList(ArrayHelper::map(common\models\Mode::find()->all(), 'id', 'name'), ['prompt' => 'select']) ?>


								</div>
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<?=
									$form->field($model, 'arrival_date')->widget(DatePicker::classname(), [
									    'type' => DatePicker::TYPE_INPUT,
									    'pluginOptions' => [
										'autoclose' => true,
										'format' => 'yyyy-mm-dd',
									]]);
									?>

								</div>
								<?php
								if (!empty($model->loading_port)) {
									$declarant = Location::findlocation($model->loading_port);
								}
								?>
								<input type="hidden" id="intrans_id" class="form-control location_field" name="InTrans[loading_port]" value= "<?= !empty($model->loading_port) ? $model->loading_port : '' ?>">
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<label class="control-label" for="intrans_code">Code</label>
									<input type="text" id="intrans_code" class="form-control " name="location" value= "<?= !empty($declarant->location_code) ? $declarant->location_code : '' ?>" autocomplete="off">
									<div class="search-keyword-dropdown search-trans_location_code"></div>
								</div>

								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<label class="control-label" for="party-declarant_id">Location</label>
									<input type="text" id="intrans_location" class="form-control location_field" name="name1" readonly="readonly" value= "<?= !empty($declarant->location_name) ? $declarant->location_name : '' ?>">
								</div>

							</div>
							<div class="row">
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<?= $form->field($model, 'coveyance_ref_no')->textInput(['maxlength' => true]) ?>
								</div>
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<?= $form->field($model, 'transport_identifier')->textInput(['maxlength' => true]) ?>
								</div>
								<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
									<?= $form->field($model, 'ocean_bill_landing_no')->textInput(['maxlength' => true])->label('Sea transport—Ocean Bill Of  Lading Number') ?>
								</div>

							</div>


							<div class='col-md-4 col-sm-6 col-xs-12'>
								<div class="form-group">
									<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save Declaration', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; ']) ?>
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
	jQuery('#intrans_code').on('keyup', function (e) {
		if (jQuery(this).val()[0] === " ") {
			$('.location_field').val('');
		} else {
			jQuery.ajax({
				url: homeUrl + 'inpayment/in-payment/search-locationkeyword',
				type: "POST",
				data: {keyword: $(this).val(), dropdown: 'trans_location'},
				success: function (data) {
					if (data === '') {
						$('.location_field').val('');
					} else {
						jQuery('.search-trans_location_code').html(data);
					}
				},
			});
		}
	});
	$('body').on('click', '.trans_location', function () {
		var id = $(this).attr('id');
		jQuery.ajax({
			url: homeUrl + 'inpayment/in-payment/search-location',
			type: "POST",
			data: {id: id},
			success: function (data) {
				var $data = JSON.parse(data);
				if ($data.msg === "success") {
					$('#intrans_id').val($data.id);
					$('#intrans_location').val($data.location_name);
					$('#intrans_code').val($data.location_code);
					jQuery('.search-keyword-dropdown').html('');
				}

			}
		});
	});
</script>



