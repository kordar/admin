<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon' => 'fa-plus'];

$this->params['small-title'] = '创建';

$this->params['link'] = 'index';
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">

    <div class="box">

        <div class="box-body">
            <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>


</div>
