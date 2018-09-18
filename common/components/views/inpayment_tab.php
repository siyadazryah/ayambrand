<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= $step == 1 ? 'active' : '' ?>">
        <?= Html::a('Header', ['header', 'id' => $id], ['class' => 'step-links']) ?>
    </li>
    <?php
    $party = common\models\Header::findOne($id);
    if ($party) {
        ?>
        <li role="presentation" class="<?= $step == 2 ? 'active' : '' ?>">
            <?= Html::a('Party', ['party', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
    <?php } ?>
    <?php
    $cargo = common\models\Party::find()->where(['status' => 1, 'header_id' => $id])->one();
    if ($cargo) {
        ?>
        <li role="presentation" class="<?= $step == 3 ? 'active' : '' ?>">
            <?= Html::a('Cargo', ['cargo', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
    <?php } ?>
    <?php
    $in_trans = common\models\Cargo::find()->where(['status' => 1, 'header_id' => $id])->one();
    if ($in_trans) {
        ?>
        <li role="presentation" class="<?= $step == 4 ? 'active' : '' ?>">
            <?= Html::a('In Trans', ['in-trans', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
    <?php } ?>
    <?php
    $ref_doc = common\models\InTrans::find()->where(['status' => 1, 'header_id' => $id])->one();
    if ($ref_doc) {
        ?>
        <li role="presentation" class="<?= $step == 5 ? 'active' : '' ?>">
            <?= Html::a('Ref. Documents', ['ref-document', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
    <?php } ?>
    <?php
    $invoice = common\models\RefDocument::find()->where(['status' => 1, 'header_id' => $id])->one();
    if ($invoice) {
        ?>
        <li role="presentation" class="<?= $step == 6 ? 'active' : '' ?>">
            <?= Html::a('Invoice', ['invoice', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
    <?php } ?>
    
        <li role="presentation" class="<?= $step == 7 ? 'active' : '' ?>">
            <?= Html::a('Item', ['item', 'id' => $id], ['class' => 'step-links']) ?>
        </li>
</ul>