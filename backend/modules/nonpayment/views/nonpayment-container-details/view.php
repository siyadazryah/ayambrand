<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NonpaymentContainerDetails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nonpayment Container Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="nonpayment-container-details-view">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?= Html::a('<span> Manage Nonpayment Container Details</span>', ['index'], ['class' => 'btn btn-warning mrg-bot-15']) ?>
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
            'cargo_id',
            'container_no',
            'size_type',
            'weight',
            'seal_no',
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


