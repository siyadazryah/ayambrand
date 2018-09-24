<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\ItemMaster;
use yii\helpers\ArrayHelper;

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
        <ul class="nav nav-pills">
            <li><?= Html::a('New Item', ['item', 'id' => $id]) ?></li>
            <li class="active"><a href="#">Item Summary</a></li>
        </ul>
        <div class="box-body table-responsive">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <!--<? Html::a('<span> Create Item</span>', ['item', 'id' => $id], ['class' => 'btn btn-block manage-btn']) ?>-->
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//                    'id',
//                    'header_id',
                    [
                        'attribute' => 'item_id',
                        'filter' => ArrayHelper::map(ItemMaster::find()->all(), 'id', 'name'),
                        'value' => function($data) {
                            return ItemMaster::findOne($data->item_id)->name;
                        }
                    ],
//                    'hs_id',
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
                    'cif_fob_value',
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
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                        'urlCreator' => function ($action, $model) {

                            if ($action === 'delete') {
                                $url = 'item-delete?item_id=' . $model->id;
                                return $url;
                            }
//
                        }
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

