<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ItemMaster */

$this->title = 'Update Item Master: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=  Html::a('<span> Manage Item Master</span>', ['index'], ['class' => 'btn btn-block manage-btn']) ?>
        <div class="item-master-update">
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->