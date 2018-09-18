<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'In Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


                    <?= Html::a('<span> Create Header</span>', ['header'], ['class' => 'btn btn-block manage-btn']) ?>
                    <button class="btn btn-white" id="search-option" style="float: right;">
                        <i class="linecons-search"></i>
                        <span>Search</span>
                    </button>
                    <div class="table-responsive" style="border: none">
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//                                'id',
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
                                [
                                    'class' => 'yii\grid\ActionColumn',
//                                    'contentOptions' => ['style' => 'width:100px;'],
                                    'header' => 'Actions',
                                    'template' => '{update}',
                                    'urlCreator' => function ($action, $model) {
                                        if ($action === 'update') {
                                            $url = Url::to(['header', 'id' => $model->id]);
                                            return $url;
                                        }
                                    }
                                ]
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".filters").slideToggle();
        $("#search-option").click(function () {
            $(".filters").slideToggle();
        });
    });
</script>

