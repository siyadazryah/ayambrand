<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentHeaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nonpayment-header-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tradenet_mailbox_id') ?>

    <?= $form->field($model, 'declarant_name') ?>

    <?= $form->field($model, 'cr_uei_no') ?>

    <?= $form->field($model, 'job_number') ?>

    <?php // echo $form->field($model, 'message_type') ?>

    <?php // echo $form->field($model, 'declaration_type') ?>

    <?php // echo $form->field($model, 'previous_permit_no') ?>

    <?php // echo $form->field($model, 'import_data') ?>

    <?php // echo $form->field($model, 'cargo_pack_type') ?>

    <?php // echo $form->field($model, 'inward_transport_mode') ?>

    <?php // echo $form->field($model, 'bg_indicator') ?>

    <?php // echo $form->field($model, 'supply_indicator') ?>

    <?php // echo $form->field($model, 'ref_documents') ?>

    <?php // echo $form->field($model, 'reference1') ?>

    <?php // echo $form->field($model, 'reference2') ?>

    <?php // echo $form->field($model, 'reference3') ?>

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
