<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kordar\yak\helpers\GridViewHelper;

/* @var $this yii\web\View */
/* @var $searchModel kordar\yak\models\admin\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yak', 'Admins');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon' => 'fa-users'];

$this->params['small-title'] = Yii::t('yak', 'Edit') . ' &amp; ' . Yii::t('yak', 'Assign');

?>

<div class="box">

    <div class="box-header">
        <?= \kordar\yak\helpers\YakHelper::renderLinker(
                \Yii::t('yak', 'Create Admin'), ['create'], ['class' => 'btn btn-success'], 'fa-plus-circle') ?>
    </div>

    <div class="box-body">

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="space-4"></div>
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
                    'format' => ['selected', $searchModel::statusList()],
                ],
                [
                    'attribute' => 'type',
                    'format' => ['selected', $searchModel::typeList()],
                ],
                // 'created_at',
                // 'updated_at',
                [
                    'class' => 'kordar\yak\libs\YakActionColumn',
                    'template' => '{view} / {update} / {delete} / {assign}',
                    'buttons' => [
                        'assign' => function ($url, $model, $key) {
                            return Html::a(\Yii::t('yak', 'Assign'), ['assign', 'id' => $model->id, 'name' => $model->name]);
                        }
                    ]
                ]

            ],
        ]); ?>
    </div>

</div>
