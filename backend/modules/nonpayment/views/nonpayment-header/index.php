<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NonpaymentHeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nonpayment Headers';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="nonpayment-header-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body table-responsive">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            
            <?=  Html::a('<span> Create Nonpayment Header</span>', ['create'], ['class' => 'btn btn-block manage-btn']) ?>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'tradenet_mailbox_id',
            'declarant_name',
            'cr_uei_no',
            'job_number',
            // 'message_type',
            // 'declaration_type',
            // 'previous_permit_no',
            // 'import_data',
            // 'cargo_pack_type',
            // 'inward_transport_mode',
            // 'bg_indicator',
            // 'supply_indicator',
            // 'ref_documents',
            // 'reference1',
            // 'reference2',
            // 'reference3',
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

