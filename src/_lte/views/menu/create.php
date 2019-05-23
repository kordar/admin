<?php

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\menu\Menu */

$this->title = \Yii::t('yak', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('yak', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['small-title'] = Yii::t('yak', 'Create');

$this->params['link'] = 'yak/menu/index';
?>
<div class="box">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>