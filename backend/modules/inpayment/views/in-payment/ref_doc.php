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

$this->title = 'Header';
$this->params['breadcrumbs'][] = ['label' => 'Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <!--<h3 class="panel-title"><?Html::encode($this->title) ?></h3>-->
                <?= Html::a('<i class="fa-th-list"></i><span> Manage Header</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

            </div>
            <div class="panel-body">
                <?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 5]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <h3 class="heading">Reference Documents</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>License Details</span>
                                    <?php
                                    if ($documents) {
                                        foreach ($documents as $doc) {
                                            ?>
                                    <a target="_blank" class="doc-file-name" href="<?= yii::$app->homeUrl.'uploads/inpayment/reference_document/docs/'.$doc->id.'.'.$doc->file?>" ><?= $doc->file_name ?></a>
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
<script>
    jQuery('#cargo-release_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.release_field').val('');
        } else {
            locationdropdown($(this).val(), 'search-release', 'search-keyword-release_code', 'release_field');
        }
    });
    $('body').on('click', '.search-release', function () {
        var id = $(this).attr('id');
        findlocation(id, 'cargo-release_');
    });
    jQuery('#cargo-receipt_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.receipt_field').val('');
        } else {
            locationdropdown($(this).val(), 'search-receipt', 'search-keyword-receipt_code', 'release_field');
        }
    });
    $('body').on('click', '.search-receipt', function () {
        var id = $(this).attr('id');
        findlocation(id, 'cargo-receipt_');
    });
    /********************/
    function findlocation(id, dropdown) {
        jQuery.ajax({
            url: homeUrl + 'inpayment/in-payment/search-location',
            type: "POST",
            data: {id: id},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    $('#' + dropdown + 'id').val($data.id);
                    $('#' + dropdown + 'location').val($data.location_name);
                    $('#' + dropdown + 'code').val($data.location_code);
                    jQuery('.search-keyword-dropdown').html('');
                }

            }
        });
    }
    function locationdropdown(keyword, dropdown, searchplace, emptyfield) {
        jQuery.ajax({
            url: homeUrl + 'inpayment/in-payment/search-locationkeyword',
            type: "POST",
            data: {keyword: keyword, dropdown: dropdown},
            success: function (data) {
                if (data === '') {
                    $('.' + emptyfield).val('');
                } else {
                    jQuery('.' + searchplace).html(data);
                }
            },
        });
    }
</script>



