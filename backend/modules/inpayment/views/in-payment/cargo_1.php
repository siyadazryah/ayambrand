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
use kartik\export\ExportMenu;

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
                <?= common\components\InpaymentTabWidget::widget(['id' => $id, 'step' => 3]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <!--<h3 class="heading">Cargo</h3>-->
                            <?php $form = ActiveForm::begin(); ?>
                            <span class="main-title-span">Location Info</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->release_location)) {
                                    $declarant = Location::findlocation($model->release_location);
                                }
                                ?>
                                <input type="hidden" id="cargo-release_id" class="form-control release_field" name="Cargo[release_location]" value= "<?= !empty($model->release_location) ? $model->release_location : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="cargo-release_code">Location Code</label>
                                    <input type="text" id="cargo-release_code" class="form-control" name="release_location" value= "<?= !empty($declarant->location_code) ? $declarant->location_code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-release_code"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Release Location</label>
                                    <input type="text" id="cargo-release_location" class="form-control release_field" name="name1" readonly="readonly" value= "<?= !empty($declarant->location_name) ? $declarant->location_name : '' ?>">
                                </div>

                            </div>
                            <div class="row">
                                <?php
                                if (!empty($model->receipt_location)) {
                                    $location = Location::findlocation($model->receipt_location);
                                }
                                ?>
                                <input type="hidden" id="cargo-receipt_id" class="form-control receipt_field" name="Cargo[receipt_location]" value= "<?= !empty($model->receipt_location) ? $model->receipt_location : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="cargo-release_code">Location Code</label>
                                    <input type="text" id="cargo-receipt_code" class="form-control" name="receipt_location" value= "<?= !empty($location->location_code) ? $location->location_code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-receipt_code"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Receipt Location</label>
                                    <input type="text" id="cargo-receipt_location" class="form-control receipt_field" name="name1" readonly="readonly" value= "<?= !empty($location->location_name) ? $location->location_name : '' ?>">
                                </div>

                            </div>
                            <span class="main-title-span">Date Info & Container details</span>
                            <div class="row row-padng-top">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?=
                                    $form->field($model, 'date')->widget(DatePicker::classname(), [
                                        'type' => DatePicker::TYPE_INPUT,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                ]])->label('Blanket Start Date');
                                    ?>
                                </div>
                            </div>
                            <span class="main-title-span">Container Details</span>
                            <div class="row ">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <?= $form->field($model, 'container_detail')->fileInput(['class' => 'form-control'])->label('Upload Container Details (via Excel)') ?>

                                </div>
                                <?php if (!$model->isNewRecord) { ?>
                                    <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                        <label class="control-label" for="cargo-container_detail">Download Container Detail (Excel)</label>
                                        <a target="_blank" class="doc-file-name" href="<?= yii::$app->homeUrl . 'uploads/inpayment/cargo/container/' . $model->id . '.' . $model->container_detail ?>" >Container Detail</a>

                                    </div>
                                <?php } ?>
                            </div>
                            <div class="appointment-service-create">
                                <button type="button" class="primary add_container_details">Add more Container Details</button>
                                <table class="table table-bordered table-responsive" id="container_details">
                                    <thead>
                                        <tr>
                                            <th>Container No</th>
                                            <th>Size/Type</th>
                                            <th>Weight</th>
                                            <th>Seal No</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="container_details_body">

                                        <tr  id="p_scents">
                                            <td><input type="text" id="containerdetails-container_no" class="form-control" name="ContainerDetails[container_no][]"></td>

                                            <td>
                                                <select id="containerdetails-size_type" class="form-control" name="ContainerDetails[size_type][]">
                                                    <option >Select</option>
                                                    <?php
                                                    $sizes = Size::find()->where(['status' => 1])->all();
                                                    if ($sizes) {
                                                        foreach ($sizes as $size) {
                                                            ?>
                                                            <option value="<?= $size->id ?>"><?= $size->size_name ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" id="containerdetails-weight" class="form-control" name="ContainerDetails[weight][]"></td>
                                            <td><input type="text" id="containerdetails-seal_no" class="form-control" name="ContainerDetails[seal_no][]"></td>
                                            <td><button type="button" class="button more_container" >Add More</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if ($dataProvider->totalCount > 0) { ?>
                                    <div class="box-body table-responsive">
                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],
//                                            'id',
//                                            'header_id',
//                                            'cargo_id',
                                                'container_no',
                                                [
                                                    'attribute' => 'size_type',
                                                    'filter' => ArrayHelper::map(Size::find()->all(), 'id', 'size_name'),
                                                    'value' => function($data) {
                                                        return Size::findOne($data->size_type)->size_name;
                                                    }
                                                ],
                                                'weight',
                                                'seal_no',
                                                // 'CB',
                                                // 'DOC',
                                                // 'DOU',
                                                // 'status',
                                                ['class' => 'yii\grid\ActionColumn',
                                                    'template' => '{delete}',
                                                    'urlCreator' => function ($action, $model) {

                                                        if ($action === 'delete') {
                                                            $url = 'container-delete?id=' . $model->id;
                                                            return $url;
                                                        }
//
                                                    }
                                                ],
                                            ],
                                        ]);?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                <div class="form-group">
                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save Declaration', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; ']) ?>
                                </div>
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



