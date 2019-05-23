<?php
namespace kordar\yak\_ace\widgets;

use yii\bootstrap\Html;

/**
 * Class Header
 * @package kordar\yak\_ace\widgets
 * @item *:Header
 */
class Header extends \kordar\yak\widgets\YakWidget
{
    public function render()
    {
        // TODO: Implement render() method.
        $smallTitle = $this->widget->subTitle === '' ?  '' :
            Html::tag('small', '<i class="ace-icon fa fa-angle-double-right"></i> ' . $this->widget->subTitle);
        return Html::tag('div',
            Html::tag('h1', $this->widget->title . $smallTitle),
            ['class' => 'page-header']
        );
    }
}