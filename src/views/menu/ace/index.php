<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kordar\yak\helpers\GridViewHelper;
use kordar\yak\helpers\SidebarHelper;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $searchModel \kordar\yak\models\menu\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('yak', 'Menus');
$this->params['breadcrumbs'][] = ['label'=>$this->title, 'icon'=>'fa-list'];

$this->params['small-title'] = Yii::t('yak', 'Create') . ' &amp; ' .  Yii::t('yak', 'Edit');
?>
<div class="sidebar-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= \kordar\yak\helpers\YakHelper::renderLinker(\Yii::t('yak', 'Create Menu'), ['create'], ['class' => 'btn btn-success btn-sm'], 'fa-plus-circle') ?>
    </p>
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
                'format' => ['selected', SidebarHelper::getSidebarDropDownList('无')],
                'filter' => SidebarHelper::getSidebarDropDownList('无')
            ],
            [
                'attribute' => 'hidden',
                'format' => ['selected', YakHelper::dropDownListYOrN()],
                'filter' => YakHelper::dropDownListYOrN(),
            ],
            // 'hidden',
            // 'language',
            // 'icon',
            // 'active',
            // 'sort',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'kordar\yak\libs\YakActionColumn'],
        ],
    ]); ?>
</div>