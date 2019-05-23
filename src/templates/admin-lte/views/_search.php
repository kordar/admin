<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
<?php if ($generator->enablePjax): ?>
        'options' => [
            'data-pjax' => 1,
            'class' => 'form-inline'
        ],
        'fieldConfig' => [
            'template' => '<div class="form-control">{label}</div>{input}'
        ],
<?php endif; ?>

        'options' => [
            'class' => 'form-inline'
            ],
        'fieldConfig' => [
            'template' => '<div class="form-control">{label}</div>{input}'
        ]

    ]); ?>

<?php
$count = 0;
foreach ($generator->getColumnNames() as $attribute) {
    if (++$count < 6) {
        echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
    } else {
        echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
    }
}
?>

    <div class="form-group">
        <?= "<?= " ?>Html::submitButton('<i class="ace-icon fa fa-search bigger-120"></i> ' . Yii::t('yak', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
