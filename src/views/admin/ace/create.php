<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model kordar\yak\models\admin\User as Admin */

$this->title = Yii::t('ace.admin', 'Create Admin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ace.admin', 'Admins'), 'url' => ['index'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['link'] = 'yak/admin/index';
?>
<div class="admin-create">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => $this->title
    ]]) ?>

    <div class="admin-form well">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirmPassword')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('ace', 'Create'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
