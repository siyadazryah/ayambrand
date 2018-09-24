<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NonpaymentInTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nonpayment In Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="nonpayment-in-trans-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body table-responsive">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            
            <?=  Html::a('<span> Create Nonpayment In Trans</span>', ['create'], ['class' => 'btn btn-block manage-btn']) ?>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'header_id',
            'mode',
            'arrival_date',
            'loading_port',
            // 'coveyance_ref_no',
            // 'transport_identifier',
            // 'ocean_bill_landing_no',
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

