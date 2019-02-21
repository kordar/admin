<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kordar\yak\models\rbac\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yak', 'Permissions');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon' => 'fa-list'];

$this->params['small-title'] = Yii::t('yak', 'Create') . ' &amp; ' .  Yii::t('yak', 'Edit');
?>
<div class="card">

    <div class="card-header">
        <?= \kordar\yak\helpers\YakHelper::renderLinker(\Yii::t('yak', 'Create Permission'), ['create-permission'], ['class' => 'btn btn-success'], 'fa-plus-circle') ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                // 'type',
                'description:ntext',
                'rule_name',
                'data',
                // 'created_at',
                // 'updated_at',

                [
                    'class' => 'kordar\yak\libs\YakActionColumn',
                    'buttonUrls' => [
                        'view' => ['url' => 'view-permission', 'attributes' => ['id' => 'name']],
                        'update' => ['url' => 'update-permission', 'attributes' => ['id' => 'name']],
                        'delete' => ['url' => 'delete-permission', 'attributes' => ['id' => 'name']],
                    ],
                ]

            ],
        ]); ?>
    </div>

</div>