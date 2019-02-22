<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \kordar\yak\widgets\Error::widget(['exception'=> $exception]) ?>