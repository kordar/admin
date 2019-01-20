<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kordar\yak\models\menu\Menu */

$this->title = \Yii::t('ace.menu', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('ace.menu', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['link'] = 'yak/menu/index';
?>
<div class="sidebar-create">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => $this->title,
        'small' => Yii::t('ace', 'Create')
    ]]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>