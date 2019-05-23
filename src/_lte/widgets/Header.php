<?php
namespace kordar\yak\_lte\widgets;

use yii\bootstrap\Html;

class Header extends \kordar\yak\widgets\YakWidget
{
    public function render()
    {
        // TODO: Implement render() method.
        return Html::tag('h1',
            $this->widget->title .
            ' <small> ' . $this->widget->subTitle . '</small>'
        );
    }
}