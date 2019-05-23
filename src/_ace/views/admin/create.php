<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model kordar\yak\models\admin\User as Admin */

$this->title = Yii::t('yak', 'Create Admin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Admins'), 'url' => ['index'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['link'] = 'yak/admin/index';
?>
<div class="admin-create">

    <div class="admin-form well">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirmPassword')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-plus-circle bigger-110"></i> ' . Yii::t('yak', 'Create'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
