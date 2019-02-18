<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kordar\yak\helpers\SidebarHelper;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $model \kordar\yak\models\menu\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(SidebarHelper::getSidebarDropDownList(\Yii::t('yak', 'Please choose superior menu'))) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->radioList(YakHelper::dropDownListYOrN(), YakHelper::aceRadioListOptions()) ?>

    <?= $form->field($model, 'hidden')->radioList(YakHelper::dropDownListYOrN(), YakHelper::aceRadioListOptions()) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save bigger-110"></i> ' . Yii::t('yak', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
