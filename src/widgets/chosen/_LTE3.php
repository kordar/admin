<?php
namespace kordar\yak\widgets\chosen;

use kordar\yak\assets\lte3\plugins\Select2Asset;

class _LTE3 extends AbstractChosen
{
    public function options(\yii\web\View $view)
    {
        // TODO: Implement render() method.

        Select2Asset::register($view);
        $view->registerJs('$(".select2").select2();');

        return ['class' => 'form-control select2', 'style' => 'width:100%'];
    }
}
