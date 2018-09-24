<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentInvoice */

$this->title = 'Create Nonpayment Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Nonpayment Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=  Html::a('<span> Manage Nonpayment Invoice</span>', ['index'], ['class' => 'btn btn-block manage-btn']) ?>
        <div class="nonpayment-invoice-create">
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

