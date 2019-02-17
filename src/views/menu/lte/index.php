<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kordar\yak\helpers\GridViewHelper;
use kordar\yak\helpers\SidebarHelper;

/* @var $this yii\web\View */
/* @var $searchModel \kordar\yak\models\menu\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('yak', 'Menus');
$this->params['breadcrumbs'][] = ['label'=>$this->title, 'icon'=>'fa-list'];

$this->params['small-title'] = Yii::t('yak', 'Create') . ' &amp; ' .  Yii::t('yak', 'Edit');

?>
<div class="box">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header">
        <?= Html::a(Html::tag('i', '', ['class'=>'fa fa-plus']) . ' ' . \Yii::t('yak', 'Create Menu'), ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </div>

    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'href',
                [
                    'attribute' => 'parent_id',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::tag('i', $model->parent_title, ['class'=>'text-info']);
                    },
                    'filter' => SidebarHelper::getSidebarDropDownList('无')
                ],
                [
                    'attribute' => 'hidden',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::tag('i', $model->hidden_name, ['class'=>'text-warning']);
                    },
                    'filter' => GridViewHelper::dropDownListYesOrNo(),
                ],
                // 'hidden',
                // 'language',
                // 'icon',
                // 'active',
                // 'sort',
                // 'status',
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>


</div>