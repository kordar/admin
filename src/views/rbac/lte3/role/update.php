<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title =  Yii::t('yak', 'Update Role') . '：' . $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Roles'), 'url' => ['roles'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view-role', 'id' => $model->name], 'icon'=>'fa-eye'];
$this->params['breadcrumbs'][] = ['label'=> Yii::t('yak', 'Update'), 'icon'=>'fa-edit'];

$this->params['small-title'] = Yii::t('yak', 'Update');

$this->params['link'] = 'yak/rbac/roles';
?>

<div class="card">

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>