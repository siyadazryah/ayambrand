<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Agents;
use common\models\ClaimantParty;

/* @var $this yii\web\View */
/* @var $model common\models\Header */

$this->title = 'Non Payment';
$this->params['breadcrumbs'][] = ['label' => 'Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <!--<h3 class="panel-title"><?Html::encode($this->title) ?></h3>-->
                <?= Html::a('<i class="fa fa-th-list"></i><span> Non Payment Declarations</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>

            </div>

            <div class="panel-body">
               <?= common\components\NonpaymentTabWidget::widget(['id' => $id, 'step' => 2]) ?>
                <div class="panel-body"><div class="header-create">
                        <div class="header-form form-inline">
                            <!--<h3 class="heading">Party</h3>-->

                            <?php $form = ActiveForm::begin(); ?>
                            <span class="main-title-span">Declairing Agent</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->declarant_id)) {
                                    $declarant = Agents::findagent($model->declarant_id);
                                }
                                ?>
                                <input type="hidden" id="party-declarant_id" class="form-control declarant_field" name="NonpaymentParty[declarant_id]" value= "<?= !empty($model->declarant_id) ? $model->declarant_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Code<span class="caret"></span></label>
                                    <input type="text" id="party-declarant_code" class="form-control" name="code1" value= "<?= !empty($declarant->code) ? $declarant->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-declarant"></div>
                                </div>

                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name1</label>
                                    <input type="text" id="party-declarant_name1" class="form-control declarant_field" name="name1" readonly="readonly" value= "<?= !empty($declarant->name1) ? $declarant->name1 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name2</label>
                                    <input type="text" id="party-declarant_name2" class="form-control declarant_field" name="name2" readonly="readonly" value= "<?= !empty($declarant->name2) ? $declarant->name2 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">CR UEI</label>
                                    <input type="text" id="party-declarant_cruei" class="form-control declarant_field" name="cruei" readonly="readonly" value= "<?= !empty($declarant->cr_uei) ? $declarant->cr_uei : '' ?>">
                                </div>
                            </div>
                            <span class="main-title-span">Importer</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->importer_id)) {
                                    $importer = Agents::findagent($model->importer_id);
                                }
                                ?>
                                <input type="hidden" id="party-importer_id" class="form-control importer_field" name="NonpaymentParty[importer_id]" value= "<?= !empty($model->importer_id) ? $model->importer_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-importer_id">Code<span class="caret"></span></label>
                                    <input type="text" id="party-importer_code" class="form-control" name="code1" value= "<?= !empty($importer->code) ? $importer->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-importer"></div>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-importer_id">Name1</label>
                                    <input type="text" id="party-importer_name1" class="form-control importer_field" name="name1" readonly="readonly" value= "<?= !empty($importer->name1) ? $importer->name1 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-importer_id">Name2</label>
                                    <input type="text" id="party-importer_name2" class="form-control importer_field" name="name2" readonly="readonly" value= "<?= !empty($importer->name2) ? $importer->name2 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-importer_id">CR UEI</label>
                                    <input type="text" id="party-importer_cruei" class="form-control importer_field" name="cruei" readonly="readonly" value= "<?= !empty($importer->cr_uei) ? $importer->cr_uei : '' ?>">
                                </div>
                            </div>
                            <span class="main-title-span">Freight Forwarder</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->frieght_forwarder_id)) {
                                    $frieght = Agents::findagent($model->frieght_forwarder_id);
                                }
                                ?>
                                <input type="hidden" id="party-frieght_forwarder_id" class="form-control frieght_field" name="NonpaymentParty[frieght_forwarder_id]" value= "<?= !empty($model->frieght_forwarder_id) ? $model->frieght_forwarder_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-importer_id">Code<span class="caret"></span></label>
                                    <input type="text" id="party-frieght_forwarder_code" class="form-control" name="code1" value= "<?= !empty($frieght->code) ? $frieght->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-frieght_forwarder"></div>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name1</label>
                                    <input type="text" id="party-frieght_forwarder_name1" class="form-control frieght_field" name="name1" readonly="readonly" value= "<?= !empty($frieght->name1) ? $frieght->name1 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name2</label>
                                    <input type="text" id="party-frieght_forwarder_name2" class="form-control frieght_field" name="name2" readonly="readonly" value= "<?= !empty($frieght->name2) ? $frieght->name2 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">CR UEI</label>
                                    <input type="text" id="party-frieght_forwarder_cruei" class="form-control frieght_field" name="cruei" readonly="readonly" value= "<?= !empty($frieght->cr_uei) ? $frieght->cr_uei : '' ?>">
                                </div>
                            </div>
                            <span class="main-title-span">Inward Carrier Agent</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->inward_agent_id)) {
                                    $inward_agent = Agents::findagent($model->inward_agent_id);
                                }
                                ?>
                                <input type="hidden" id="party-inward_agent_id" class="form-control inward_field" name="NonpaymentParty[inward_agent_id]" value= "<?= !empty($model->inward_agent_id) ? $model->inward_agent_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-inward_agent_id">Code<span class="caret"></span></label>
                                    <input type="text" id="party-inward_agent_code" class="form-control" name="code1" value= "<?= !empty($inward_agent->code) ? $inward_agent->code : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-inward_agent"></div>
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name1</label>
                                    <input type="text" id="party-inward_agent_name1" class="form-control inward_field" name="name1" readonly="readonly" value= "<?= !empty($inward_agent->name1) ? $inward_agent->name1 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name2</label>
                                    <input type="text" id="party-inward_agent_name2" class="form-control inward_field" name="name2" readonly="readonly" value= "<?= !empty($inward_agent->name2) ? $inward_agent->name2 : '' ?>">
                                </div>
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">CR UEI</label>
                                    <input type="text" id="party-inward_agent_cruei" class="form-control inward_field" name="cruei" readonly="readonly" value= "<?= !empty($inward_agent->cr_uei) ? $inward_agent->cr_uei : '' ?>">
                                </div>
                            </div>
                            <span class="main-title-span">Claimant Party Info</span>
                            <div class="row row-padng-top">
                                <?php
                                if (!empty($model->claimant_party_id)) {
                                    $claimant = ClaimantParty::findclaimant($model->claimant_party_id);
                                }
                                ?>
                                <input type="hidden" id="party-claimant_party_id" class="form-control claimant_field" name="NonpaymentParty[claimant_party_id]" value= "<?= !empty($model->claimant_party_id) ? $model->claimant_party_id : '' ?>">
                                <div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-claimant_party_id">Claimant Id<span class="caret"></span></label>
                                    <input type="text" id="party-claimant_party_claimant_id" class="form-control" name="claimant_id" value= "<?= !empty($claimant->claimant_id) ? $claimant->claimant_id : '' ?>" autocomplete="off">
                                    <div class="search-keyword-dropdown search-keyword-claimant_party"></div>
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name1</label>
                                    <input type="text" id="party-claimant_party_name1" class="form-control claimant_field" name="name1" readonly="readonly" value= "<?= !empty($claimant->name1) ? $claimant->name1 : '' ?>">
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-declarant_id">Name2</label>
                                    <input type="text" id="party-claimant_party_name2" class="form-control claimant_field" name="name2" readonly="readonly" value= "<?= !empty($claimant->name2) ? $claimant->name2 : '' ?>">
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-claimant_party_id">CR UEI</label>
                                    <input type="text" id="party-claimant_party_cr_uei" class="form-control claimant_field" name="cr_uei" readonly="readonly" value= "<?= !empty($claimant->cr_uei) ? $claimant->cr_uei : '' ?>">
                                </div>
                                <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
                                    <label class="control-label" for="party-claimant_party_id">Claimant Name</label>
                                    <input type="text" id="party-claimant_party_claimant_name" class="form-control claimant_field" name="claimant_name" readonly="readonly" value= "<?= !empty($claimant->claimant_name) ? $claimant->claimant_name : '' ?>">
                                </div>
                                <a class="new_claimant_party">new claimant party</a>
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



