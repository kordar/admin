<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\admin\User as Admin */

$this->title = Yii::t('yak', 'Update Admin') . '：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Admins'), 'url' => ['index'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id], 'icon' => 'fa-eye'];
$this->params['breadcrumbs'][] = Yii::t('yak', 'Update');

$this->params['small-title'] = Yii::t('yak', 'Update');

$this->params['link'] = 'yak/admin/index';
?>
<div class="card">

    <div class="card-body">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'username')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-edit bigger-110"></i> ' . Yii::t('yak', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>