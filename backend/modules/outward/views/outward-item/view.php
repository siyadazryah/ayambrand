<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OutwardItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outward Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="outward-item-view">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?= Html::a('<span> Manage Outward Item</span>', ['index'], ['class' => 'btn btn-warning mrg-bot-15']) ?>
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
            'item_id',
            'description:ntext',
            'hs_id',
            'item_no',
            'dangerous_goods',
            'country_origin',
            'unbranded',
            'model',
            'outer_pack_qty',
            'outer_pack_unit',
            'in_pack_qty',
            'in_pack_unit',
            'inner_pack_qty',
            'inner_pack_unit',
            'inmost_pack_qty',
            'inmost_pack_unit',
            'item_invoice',
            'cif_fob_value',
            'total_dutiable_qty',
            'total_dutiable_unit',
            'hs_qty',
            'hs_qty_unit',
            'hawb_obl',
            'preferential_code',
            'gst_percentage',
            'gst_amount',
            'excise_duty',
            'customs_duty',
            'current_lot',
            'previous_lot',
            'marking',
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


