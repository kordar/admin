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
<div class="auth-item-view">


    <p>

        <?= YakHelper::renderLinker(Yii::t('yak', 'Update'), ['update-role', 'id' => $model->name], ['class' => 'btn btn-primary btn-sm'], 'fa-edit') ?>
        <?= YakHelper::renderLinker(Yii::t('yak', 'Delete'), ['delete-role', 'id' => $model->name], ['class' => 'btn btn-danger btn-sm', 'data' => [
            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'method' => 'post']
        ], 'fa-trash') ?>

    </p>

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