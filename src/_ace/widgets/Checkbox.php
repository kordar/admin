<?php
namespace kordar\yak\_ace\widgets;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class Checkbox extends \kordar\yak\widgets\YakWidget
{
    public function render()
    {
        // TODO: Implement render() method.
        switch ($this->widget->type) {
            case 'html':
                return Html::checkboxList($this->widget->name, $this->widget->attribute, $this->widget->items, $this->options());

            default:
                return Html::activeCheckboxList($this->widget->model, $this->widget->attribute, $this->widget->items, $this->options());
        }
    }

    public function options()
    {
        // TODO: Implement render() method.
        return [
            'class'=>'radio form-control auto-height',
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::checkbox($name, $checked, array_merge(['class' => ArrayHelper::getValue($this->config, 'options.class', 'ace')], [
                    'value' => $value,
                    'label' => Html::tag('span', Html::encode(' ' . $label), ['class'=>'lbl'])
                ]));
            }
        ];
    }
}