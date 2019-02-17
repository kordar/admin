<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title = Yii::t('yak', 'Create Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Roles'), 'url' => ['create-role'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['small-title'] = Yii::t('yak', 'Create');

$this->params['link'] = 'yak/rbac/roles';
?>
<div class="auth-item-create">

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>