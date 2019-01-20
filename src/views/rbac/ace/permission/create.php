<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\ace\models\rbac\AuthItem */

$this->title = Yii::t('ace.rbac', 'Create Permission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ace.rbac', 'Permissions'), 'url' => ['permissions'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['link'] = 'yak/rbac/permissions';
?>
<div class="auth-item-create">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => Html::encode($this->title),
        'small' => Yii::t('ace', 'Create')
    ]]) ?>

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>