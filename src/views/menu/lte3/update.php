<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\menu\Menu */

$this->title = Yii::t('yak', 'Update Menu') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('yak', 'Menus'), 'url' => ['index'], 'icon'=>'fa-list'];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id], 'icon'=>'fa-eye'];
$this->params['breadcrumbs'][] = ['label' => \Yii::t('yak', 'Update'), 'icon'=>'fa-edit'];

$this->params['small-title'] = Yii::t('yak', 'Update');

$this->params['link'] = 'yak/menu/index';
?>
<div class="card">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>