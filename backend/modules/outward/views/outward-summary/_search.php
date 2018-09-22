<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OutwardSummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outward-summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header_id') ?>

    <?= $form->field($model, 'no_of_items') ?>

    <?= $form->field($model, 'total_cif_value') ?>

    <?= $form->field($model, 'cif_fob_value') ?>

    <?php // echo $form->field($model, 'total_outer_pack') ?>

    <?php // echo $form->field($model, 'total_gross_weight') ?>

    <?php // echo $form->field($model, 'total_gst_amount') ?>

    <?php // echo $form->field($model, 'excise_duty_amount') ?>

    <?php // echo $form->field($model, 'customs_duty_amount') ?>

    <?php // echo $form->field($model, 'other_tax_amount') ?>

    <?php // echo $form->field($model, 'amount_payable') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
