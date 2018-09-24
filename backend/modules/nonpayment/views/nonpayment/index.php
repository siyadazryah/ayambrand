<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Non Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box table-responsive">
    <div class="admin-posts-index">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

            <?= Html::a('<span>New Non Payment Declaration</span>', ['header'], ['class' => 'btn btn-block manage-btn']) ?>
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
    <!-- /.box-body -->
</div>
<!-- /.box -->

