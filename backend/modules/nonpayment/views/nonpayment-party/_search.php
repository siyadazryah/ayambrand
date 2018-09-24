<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentPartySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nonpayment-party-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header_id') ?>

    <?= $form->field($model, 'declarant_id') ?>

    <?= $form->field($model, 'importer_id') ?>

    <?= $form->field($model, 'frieght_forwarder_id') ?>

    <?php // echo $form->field($model, 'inward_agent_id') ?>

    <?php // echo $form->field($model, 'claimant_party_id') ?>

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
