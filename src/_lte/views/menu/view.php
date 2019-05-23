<?php

use yii\widgets\DetailView;
use kordar\yak\helpers\YakHelper;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\menu\Menu */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('yak', 'Menus'), 'url' => ['index'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'icon'=>'fa-eye'];

$this->params['small-title'] = Yii::t('yak', 'Grid View');

$this->params['link'] = 'yak/menu/index';

?>
<div class="box">

    <div class="box-header">
        <?= YakHelper::renderLinker(Yii::t('yak', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary'], 'fa-edit') ?>
        <?= YakHelper::renderLinker(Yii::t('yak', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => [
            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'method' => 'post']
        ], 'fa-trash') ?>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'href',
                [
                    'attribute' => 'parent_id',
                    'value' => function ($model) {
                        return \kordar\yak\models\menu\Menu::find()->select('title')->where(['id' => $model->parent_id])->scalar();
                    }
                ],
                'language',
                //DetailViewHelper::fontAwesomeIcon($model->icon, 'icon'),
                'icon:icon',
                [
                    'attribute' => 'active',
                    'format' => ['selected', YakHelper::dropDownListYOrN()]
                ],
                'sort',
                [
                    'attribute' => 'status',
                    'format' => ['selected', YakHelper::dropDownListActive()]
                ],
                'created_at:datetime',
                'updated_at:datetime',
            ],

        ]) ?>
    </div>

</div>