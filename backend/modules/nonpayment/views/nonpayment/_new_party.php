<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">New CLaimant Party</h4>
</div>
<div class="modal-body">
	<form method="post" id="claiment-submit">


		<div class="row">
			<div class="col-md-6 col-sm-2 col-xs-12 left_padd">
				<div class="form-group">
					<label class="control-label" for="amount">Claimant Id</label>
					<input type="text" id="claiment_id" class="form-control" name="claiment_id" value="" aria-invalid="false" required>
				</div>
			</div>
			<div class="col-md-6 col-sm-2 col-xs-12 left_padd">
				<div class="form-group">
					<label class="control-label" for="transaction-date">Name 1</label>
					<input type="text" id="name_1" class="form-control" name="name_1" value="" aria-invalid="false" required>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6 col-sm-2 col-xs-12 left_padd">
				<div class="form-group">
					<label class="control-label" for="amount">Name 2</label>
					<input type="text" id="name_2" class="form-control" name="name_2" value="" aria-invalid="false">
				</div>
			</div>
			<div class="col-md-6 col-sm-2 col-xs-12 left_padd">
				<div class="form-group">
					<label class="control-label" for="transaction-date">CR UEI</label>
					<input type="text" id="cr_uei" class="form-control" name="cr_uei" value="" aria-invalid="false" required>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6 col-sm-2 col-xs-12 left_padd">
				<div class="form-group">
					<label class="control-label" for="transaction-comment">Claiment_name</label>
					<input type="text" id="claiment_name" class="form-control" name="claiment_name" value="" aria-invalid="false">
				</div>
			</div>

		</div>


		<div class="modal-footer">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="trigger_close">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>
	</form>
</div>

<script>
	$("document").ready(function () {
		$("#claiment-submit").submit(function (e) {
			var str = $(this).serialize();
			$.ajax({
				type: "POST",
				url: '<?= Yii::$app->homeUrl; ?>nonpayment/nonpayment/ajax-add-claiment',
				data: str, // serializes the form's elements.
				success: function (data)
				{
					var result = JSON.parse(data);
					if (result.msg == 'success') {
						$('#party-claimant_party_id').val(result.id);
						$('#party-claimant_party_name1').val(result.name1);
						$('#party-claimant_party_name2').val(result.name2);
						$('#party-claimant_party_cr_uei').val(result.cr_uei);
						$('#party-claimant_party_claimant_name').val(result.claimant_name);
					}
					$("#trigger_close").click();
//					$.pjax.reload({container: '#products-table', timeout: false});
				}
			});

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
	});
</script>
