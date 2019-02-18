<?php

use yii\widgets\DetailView;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Permissions'), 'url' => ['permissions'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $this->title];

$this->params['small-title'] = Yii::t('yak', 'View');

$this->params['link'] = 'yak/rbac/permissions';
?>
<div class="box">

    <div class="box-header">
        <?= YakHelper::renderLinker(Yii::t('yak', 'Update'), ['update-permission', 'id' => $model->name], ['class' => 'btn btn-primary btn-sm'], 'fa-edit') ?>
        <?= YakHelper::renderLinker(Yii::t('yak', 'Delete'), ['delete-permission', 'id' => $model->name], ['class' => 'btn btn-danger btn-sm', 'data' => [
            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'method' => 'post']
        ], 'fa-trash') ?>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'type',
                'description:ntext',
                'rule_name',
                'data',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>

</div>