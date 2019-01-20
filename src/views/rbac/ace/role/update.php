<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title =  Yii::t('ace.rbac', 'Update Role') . '：' . $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ace.rbac', 'Roles'), 'url' => ['roles'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view-role', 'id' => $model->name], 'icon'=>'fa-eye'];
$this->params['breadcrumbs'][] = ['label'=> Yii::t('ace', 'Update'), 'icon'=>'fa-edit'];

$this->params['link'] = 'yak/rbac/roles';
?>

<div class="auth-item-update">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => Html::encode($this->title),
        'small' => Yii::t('ace', 'Grid Update')
    ]]) ?>

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>