<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title = Yii::t('yak', 'Create Permission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Permissions'), 'url' => ['permissions'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['small-title'] = Yii::t('yak', 'Create');

$this->params['link'] = 'yak/rbac/permissions';
?>
<div class="card">

    <?= $this->render('../_form', [
        'model' => $model,
    ]) ?>

</div>