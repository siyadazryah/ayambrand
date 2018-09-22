<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OutwardInTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outward-in-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header_id') ?>

    <?= $form->field($model, 'mode') ?>

    <?= $form->field($model, 'arrival_date') ?>

    <?= $form->field($model, 'loading_port') ?>

    <?php // echo $form->field($model, 'coveyance_ref_no') ?>

    <?php // echo $form->field($model, 'transport_identifier') ?>

    <?php // echo $form->field($model, 'ocean_bill_landing_no') ?>

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
