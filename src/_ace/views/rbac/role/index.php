<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kordar\yak\models\rbac\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yak', 'Roles');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon' => 'fa-list'];

$this->params['small-title'] = Yii::t('yak', 'Create') . ' &amp; ' .  Yii::t('yak', 'Edit') . ' &amp; ' . Yii::t('yak', 'Assign');

?>
<div class="auth-item-index">

    <p>
        <?= Html::a(Yii::t('yak', Html::tag('span', '', ['class'=>'fa fa-group']) . ' {title}', ['title'=>Yii::t('yak', 'Create Role')]), ['create-role'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
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
                'template' => '{view} / {update} / {assign} / {delete}',
                'buttonUrls' => [
                    'view' => ['url' => 'view-role', 'attributes' => ['id' => 'name']],
                    'update' => ['url' => 'update-role', 'attributes' => ['id' => 'name']],
                    'delete' => ['url' => 'delete-role', 'attributes' => ['id' => 'name']],
                ],
                'buttons' => [
                    'assign' => function ($url, $model, $key) {
                        return Html::a(\Yii::t('yak', 'Assign'), ['assign', 'id' => $model->name]);
                    }
                ]
            ]
        ],
    ]); ?>
</div>