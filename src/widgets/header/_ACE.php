<?php
namespace kordar\yak\widgets\header;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class _ACE extends AbstractHeader
{
    public function render(\yii\web\View $view)
    {
        // TODO: Implement render() method.
        $title = ArrayHelper::getValue($this->info, 'title', '@Title');
        $smallTitle = ArrayHelper::getValue($this->info, 'small', '');
        $smallTitle = empty($smallTitle) ? '' : ' <small><i class="ace-icon fa fa-angle-double-right"></i> ' . $smallTitle . '</small>';
        return Html::tag('div', Html::tag('h1', $title . $smallTitle), ['class' => 'page-header']);
    }
}