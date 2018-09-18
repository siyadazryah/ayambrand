<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="item-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body table-responsive">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            
            <?=  Html::a('<span> Create Item</span>', ['create'], ['class' => 'btn btn-block manage-btn']) ?>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'header_id',
            'item_id',
            'hs_id',
            'item_no',
            // 'dangerous_goods',
            // 'country_origin',
            // 'unbranded',
            // 'model',
            // 'outer_pack_qty',
            // 'outer_pack_unit',
            // 'in_pack_qty',
            // 'in_pack_unit',
            // 'inner_pack_qty',
            // 'inner_pack_unit',
            // 'inmost_pack_qty',
            // 'inmost_pack_unit',
            // 'item_invoice',
            // 'cif_fob_value',
            // 'total_dutiable_qty',
            // 'total_dutiable_unit',
            // 'hs_qty',
            // 'hs_qty_unit',
            // 'hawb_obl',
            // 'preferential_code',
            // 'gst_percentage',
            // 'gst_amount',
            // 'excise_duty',
            // 'customs_duty',
            // 'current_lot',
            // 'previous_lot',
            // 'marking',
            // 'CB',
            // 'UB',
            // 'DOC',
            // 'DOU',
            // 'status',

                ['class' => 'yii\grid\ActionColumn'],
                ],
                ]); ?>
                                </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

