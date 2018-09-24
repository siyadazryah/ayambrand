<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentSummary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nonpayment Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="nonpayment-summary-view">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?= Html::a('<span> Manage Nonpayment Summary</span>', ['index'], ['class' => 'btn btn-warning mrg-bot-15']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary mrg-bot-15']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger mrg-bot-15',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>

            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                        'id',
            'header_id',
            'no_of_items',
            'total_cif_value',
            'cif_fob_value',
            'total_outer_pack',
            'total_gross_weight',
            'total_gst_amount',
            'excise_duty_amount',
            'customs_duty_amount',
            'other_tax_amount',
            'amount_payable',
            'remarks:ntext',
            'CB',
            'UB',
            'DOC',
            'DOU',
            'status',
            ],
            ]) ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


