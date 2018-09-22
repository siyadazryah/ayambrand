<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header_id') ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'hs_id') ?>

    <?= $form->field($model, 'item_no') ?>

    <?php // echo $form->field($model, 'dangerous_goods') ?>

    <?php // echo $form->field($model, 'country_origin') ?>

    <?php // echo $form->field($model, 'unbranded') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'outer_pack_qty') ?>

    <?php // echo $form->field($model, 'outer_pack_unit') ?>

    <?php // echo $form->field($model, 'in_pack_qty') ?>

    <?php // echo $form->field($model, 'in_pack_unit') ?>

    <?php // echo $form->field($model, 'inner_pack_qty') ?>

    <?php // echo $form->field($model, 'inner_pack_unit') ?>

    <?php // echo $form->field($model, 'inmost_pack_qty') ?>

    <?php // echo $form->field($model, 'inmost_pack_unit') ?>

    <?php // echo $form->field($model, 'item_invoice') ?>

    <?php // echo $form->field($model, 'cif_fob_value') ?>

    <?php // echo $form->field($model, 'total_dutiable_qty') ?>

    <?php // echo $form->field($model, 'total_dutiable_unit') ?>

    <?php // echo $form->field($model, 'hs_qty') ?>

    <?php // echo $form->field($model, 'hs_qty_unit') ?>

    <?php // echo $form->field($model, 'hawb_obl') ?>

    <?php // echo $form->field($model, 'preferential_code') ?>

    <?php // echo $form->field($model, 'gst_percentage') ?>

    <?php // echo $form->field($model, 'gst_amount') ?>

    <?php // echo $form->field($model, 'excise_duty') ?>

    <?php // echo $form->field($model, 'customs_duty') ?>

    <?php // echo $form->field($model, 'current_lot') ?>

    <?php // echo $form->field($model, 'previous_lot') ?>

    <?php // echo $form->field($model, 'marking') ?>

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
