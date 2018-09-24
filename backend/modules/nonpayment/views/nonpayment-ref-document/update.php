<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentRefDocument */

$this->title = 'Update Nonpayment Ref Document: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nonpayment Ref Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=  Html::a('<span> Manage Nonpayment Ref Document</span>', ['index'], ['class' => 'btn btn-block manage-btn']) ?>
        <div class="nonpayment-ref-document-update">
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->