<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kordar\yak\helpers\GridViewHelper;

/* @var $this yii\web\View */
/* @var $searchModel kordar\yak\models\admin\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yak', 'Admins');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon' => 'fa-users'];
$this->params['small-title'] = \Yii::t('yak', 'Edit') . ' &amp; ' . \Yii::t('yak', 'Assign');

?>

<div class="box">

    <div class="box-header with-border">
        <?= Html::a('<i class="ace-icon fa fa-plus-circle bigger-110"></i> ' . Yii::t('yak', 'Create Admin'), ['create'], ['class' => 'btn btn-success btn-sm']) ?>

    </div>

    <div class="box-header">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>



    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                // 'avatar',
                'username',
                'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::tag('i', $model->status_name, ['class'=>'text-info']);
                    },
                    'filter' => $searchModel::statusList()
                ],
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::tag('i', $model->type_name, ['class'=>'text-warning']);
                    },
                    'filter' => $searchModel::typeList()
                ],
                // 'created_at',
                // 'updated_at',
                GridViewHelper::actionColumn([
                    'title' => '操作',
                    'template' => ['view', 'update', 'assign'],
                    'item' => [
                        'view' => ['url' => 'view'],
                        'update' => ['url' => 'update'],
                        'assign' => ['url' => 'assign', 'attribute' => ['name']]
                    ]
                ]),

            ],
        ]); ?>
    </div>



</div>