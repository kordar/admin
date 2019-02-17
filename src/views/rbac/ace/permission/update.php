<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title =  Yii::t('yak', 'Update Permission') . '：' . $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Permissions'), 'url' => ['permissions'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view-permission', 'id' => $model->name], 'icon'=>'fa-eye'];
$this->params['breadcrumbs'][] = ['label'=> Yii::t('yak', 'Update'), 'icon'=>'fa-edit'];

$this->params['small-title'] = Yii::t('yak', 'Update');

$this->params['link'] = 'yak/rbac/permissions';
?>

<div class="auth-item-update">

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>