<?php

namespace kordar\yak\_lte\widgets;

use kordar\yak\assets\Select2Asset;
use yii\helpers\Html;

class Select extends \kordar\yak\widgets\YakWidget
{
    public function render()
    {
        // TODO: Implement render() method.
        switch ($this->widget->type) {
            case 'chosen':
                return $this->renderChosen();

            default:
                return $this->renderDefault();
        }
    }

    protected function renderDefault()
    {
        return Html::activeDropDownList($this->widget->model, $this->widget->attribute, $this->widget->items, []);
    }

    protected function renderChosen()
    {
        // TODO: Implement render() method.

        Select2Asset::register($this->widget->view);
        $this->widget->view->registerJs('$(".select2").select2();');

        $options = ['class' => 'form-control select2', 'style' => 'width:100%'];

        if ($this->widget->multiple) {
            $options['multiple'] = 'multiple';
        }

        if ($this->widget->dataPlaceholder) {
            $options['data-placeholder'] = $this->widget->dataPlaceholder;
        }

        return Html::activeDropDownList($this->widget->model, $this->widget->attribute, $this->widget->items, $options);
    }
}