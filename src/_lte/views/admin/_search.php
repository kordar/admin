<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kordar\yak\models\admin\User AS Admin;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\menu\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'form-inline'
        ],
        'fieldConfig' => [
            'template' => '<div class="form-control">{label}</div>{input}'
        ]
    ]); ?>

    <div class="search-group">
        <?= \kordar\yak\widgets\search\DropDownDateSearch::widget(['model' => $model, 'items' => ['created_at']])?>
    </div>

    <div class="search-group">
        <?= \kordar\yak\widgets\search\DropDownSearch::widget(['model' => $model, 'items' => ['id', 'name', 'username', 'email']])?>

        <?= $form->field($model, 'type', ['template'=>"{input}"])->dropDownList(Admin::typeList(), ['prompt'=>'管理员类型']) ?>

        <?= $form->field($model, 'status', ['template'=>"{input}"])->dropDownList(Admin::statusList(), ['prompt'=>'管理员状态']) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="ace-icon fa fa-search bigger-120"></i> ' . Yii::t('yak', 'Search'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>




















    <?php ActiveForm::end(); ?>

</div>
