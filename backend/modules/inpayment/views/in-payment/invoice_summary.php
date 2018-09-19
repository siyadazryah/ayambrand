<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\ItemMaster;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Summary';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="item-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <ul class="nav nav-pills">
            <li><?= Html::a('New Invoice', ['invoice', 'id' => $id]) ?></li>
            <li class="active"><a href="#">Invoice Summary</a></li>
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
                    'invoice_no',
                    'invoice_date',
                    'term_type',
                    // 'ad_valorem_indicator',
                    // 'duty_rate_indicator',
                    // 'importer_id',
                    // 'manufacturer_id',
                     'invoice_amount',
                    // 'freight_amount',
                    // 'total_amount',
                    // 'other_tax_amount',
                    // 'freight_charge',
                    // 'insurance_charge',
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

