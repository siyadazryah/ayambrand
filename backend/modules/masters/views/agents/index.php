<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AgentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agents';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="agents-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body table-responsive">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= Html::a('<span> Create Agents</span>', ['create'], ['class' => 'btn btn-block manage-btn']) ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//                    'id',
                    'code',
                    [
                        'attribute' => 'agent_type',
                        'filter' => ['0' => 'Declaring Agent', '1' => 'Frieght Forwarder', '2' => 'Importer', '3' => 'Inward Carrier Agent', '4' => 'Supplier Manufacturer Party'],
                        'value' => function($data) {
                             if($data->agent_type == 0)
                                 $agent = 'Declaring Agent';
                             if($data->agent_type == 1)
                                 $agent = 'Frieght Forwarder';
                             if($data->agent_type == 2)
                                 $agent = 'Importer';
                             if($data->agent_type == 3)
                                 $agent = 'Inward Carrier Agent';
                             if($data->agent_type == 4)
                                 $agent = 'Supplier Manufacturer Party';
                            return $agent;
                        }
                    ],
                    'name1',
                    'name2',
                    // 'cr_uei',
                    // 'CB',
                    // 'UB',
                    // 'DOC',
                    // 'DOU',
                    // 'status',
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}'],
                ],
            ]);
            ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

