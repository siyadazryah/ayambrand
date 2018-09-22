<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OutwardCargo */

$this->title = 'Create Outward Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Outward Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=  Html::a('<span> Manage Outward Cargo</span>', ['index'], ['class' => 'btn btn-block manage-btn']) ?>
        <div class="outward-cargo-create">
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

