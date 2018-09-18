<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Update {modelClass}: ', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?> . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= "<?= " ?> Html::a('<span> Manage <?= Inflector::camel2words(StringHelper::basename($generator->modelClass)); ?></span>', ['index'], ['class' => 'btn btn-block manage-btn']) ?>
        <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
            <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->