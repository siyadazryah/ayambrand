<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Summaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="summary-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body table-responsive">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            
            <?=  Html::a('<span> Create Summary</span>', ['create'], ['class' => 'btn btn-block manage-btn']) ?>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'header_id',
            'no_of_items',
            'total_cif_value',
            'cif_fob_value',
            // 'total_outer_pack',
            // 'total_gross_weight',
            // 'total_gst_amount',
            // 'excise_duty_amount',
            // 'customs_duty_amount',
            // 'other_tax_amount',
            // 'amount_payable',
            // 'remarks:ntext',
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

