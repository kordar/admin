<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kordar\yak\helpers\DetailViewHelper;

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
        <?= Html::a(\Yii::t('yak', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::t('yak', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'href',
                'parent_title',
                'language',
                DetailViewHelper::fontAwesomeIcon($model->icon, 'icon'),
                DetailViewHelper::active($model->active, 'active'),
                'sort',
                DetailViewHelper::status($model->status, 'status'),
                'created_at:datetime',
                'updated_at:datetime',
            ],

        ]) ?>
    </div>

</div>