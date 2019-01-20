<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ace.rbac', 'Roles'), 'url' => ['roles'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $this->title];

$this->params['link'] = 'yak/rbac/roles';
?>
<div class="auth-item-view">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => Html::encode($this->title),
        'small' => Yii::t('ace', 'Grid Update')
    ]]) ?>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update-role', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete-role', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
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