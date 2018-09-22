<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Header */

$this->title = 'Rference Document';
$this->params['breadcrumbs'][] = ['label' => 'Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .doc {
        width: 100%;
        height: 500px;
    }
</style>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <iframe class="doc" src="https://docs.google.com/gview?url=<?= yii::$app->homeUrl . 'uploads/inpayment/reference_document/docs/' . $doc->id . '.' . $doc->file ?>&embedded=true"></iframe>
            <!--<iframe class="doc" src="https://docs.google.com/gview?url=http://writing.engr.psu.edu/workbooks/formal_report_template.doc&embedded=true"></iframe>-->
       <!--<? yii::$app->homeUrl . 'uploads/inpayment/reference_document/docs/' . $doc->id . '.' . $doc->file ?>-->
        </div>
    </div>
</div>



