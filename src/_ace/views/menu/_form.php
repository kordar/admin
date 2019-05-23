<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kordar\yak\helpers\SidebarHelper;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $model \kordar\yak\models\menu\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sidebar-form well">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>

    <?php  // $form->field($model, 'parent_id')->dropDownList(SidebarHelper::getSidebarDropDownList(\Yii::t('yak', 'Please choose superior menu'))) ?>

    <?= $form->field($model, 'parent_id')->widget('kordar\yak\widgets\chosen\Chosen', [
            'items' => SidebarHelper::getSidebarDropDownList(\Yii::t('yak', 'Please choose superior menu'))
    ])?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->widget('kordar\yak\widgets\radio\Radio', ['items' => YakHelper::dropDownListYOrN()]) ?>

    <?= $form->field($model, 'hidden')->widget('kordar\yak\widgets\radio\Radio', ['items' => YakHelper::dropDownListYOrN()]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save bigger-110"></i> ' . Yii::t('yak', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
