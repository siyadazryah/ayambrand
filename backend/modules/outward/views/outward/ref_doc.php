<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Agents;
use common\models\ClaimantParty;
use kartik\date\DatePicker;
use common\models\Location;
use common\models\Size;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Header */

$this->title = 'Outward';
$this->params['breadcrumbs'][] = ['label' => 'Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <!--<h3 class="panel-title"><?Html::encode($this->title) ?></h3>-->
                <?= Html::a('<i class="fa fa-th-list"></i><span> Outward Declarations</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

            </div>
            <div class="panel-body">
                <?= common\components\OutwardTabWidget::widget(['id' => $id, 'step' => 5]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <!--<h3 class="heading">Reference Documents</h3>-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="main-title-span">License Details</span>
                                    <?php
                                    if ($documents) {
                                        foreach ($documents as $doc) {
                                            ?>
                                    <div class="doc-file-div">
                                            <?= Html::a('<span>' . $doc->file_name . '</span>', ['document', 'id' => $doc->id], ['class' => 'doc-file-name', 'target' => '_blank']) ?>
                                            <a target="_blank" href="<?= yii::$app->homeUrl . 'uploads/outward/reference_document/docs/' . $doc->id . '.' . $doc->file ?>" ><button class="btn doc-download"><i class="fa fa-download"></i></button></a>
                                    </div>   
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>


                            <?php $form = ActiveForm::begin(); ?>


                            <div class="appointment-service-create">

                                <table class="table table-bordered table-responsive" id="ref_doc">
                                    <thead>
                                        <tr>
                                            <th>Doc Type</th>
                                            <th>Doc File Name</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="container_details_body">

                                        <tr  id="p_scents">
                                            <td><?= $form->field($model, 'doc_type')->dropDownList(['1' => 'Doc type 1', '0' => 'Doc type 2'])->label(FALSE) ?></td>

                                            <td><?= $form->field($model, 'file_name')->textInput(['maxlength' => true])->label(FALSE) ?></td>
                                            <td><?= $form->field($model, 'file')->fileInput(['class' => 'form-control'])->label(FALSE) ?></td>
                                            <td><button type="submit" class="button" >Create</button></td>
                                            <!--<td><button type="button" class="button more_container" >Add More</button></td>-->
                                        </tr>
                                    </tbody>
                                </table>

                            </div>



                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



