<?php
namespace kordar\yak\widgets\header;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class _LTE3 extends AbstractHeader
{
    public function render(\yii\web\View $view)
    {
        // TODO: Implement render() method.
        $title = ArrayHelper::getValue($this->info, 'title', '@Title');
        $smallTitle = ArrayHelper::getValue($this->info, 'small', '');
        $smallTitle = empty($smallTitle) ? '' : ' <small> ' . $smallTitle . '</small>';
        return Html::tag('h1', $title . $smallTitle);
    }
}