<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentInvoice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nonpayment Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="nonpayment-invoice-view">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?= Html::a('<span> Manage Nonpayment Invoice</span>', ['index'], ['class' => 'btn btn-warning mrg-bot-15']) ?>
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
            'invoice_no',
            'invoice_date',
            'term_type',
            'ad_valorem_indicator',
            'duty_rate_indicator',
            'importer_id',
            'manufacturer_id',
            'invoice_amount',
            'freight_amount',
            'total_amount',
            'other_tax_amount',
            'freight_charge',
            'insurance_charge',
            'gst_amount',
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


