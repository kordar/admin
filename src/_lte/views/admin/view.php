<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\admin\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Admins'), 'url' => ['index'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['small-title'] = Yii::t('yak', 'Grid View');

$this->params['link'] = 'yak/admin/index';
?>
<div class="box">

    <div class="box-header">

        <?= \kordar\yak\helpers\YakHelper::renderLinker(Yii::t('yak', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary'], 'fa-edit') ?>
        <?= \kordar\yak\helpers\YakHelper::renderLinker(Yii::t('yak', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => [
            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'method' => 'post']
        ], 'fa-trash') ?>

    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'avatar',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email:email',
                'status_name',
                'type_name',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>

</div>