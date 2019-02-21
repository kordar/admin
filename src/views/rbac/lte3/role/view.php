<?php

use yii\widgets\DetailView;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Roles'), 'url' => ['roles'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $this->title];

$this->params['small-title'] = Yii::t('yak', 'Update');

$this->params['link'] = 'yak/rbac/roles';
?>
<div class="card">


    <div class="card-header">

        <?= YakHelper::renderLinker(Yii::t('yak', 'Update'), ['update-role', 'id' => $model->name], ['class' => 'btn btn-primary'], 'fa-edit') ?>
        <?= YakHelper::renderLinker(Yii::t('yak', 'Delete'), ['delete-role', 'id' => $model->name], ['class' => 'btn btn-danger', 'data' => [
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