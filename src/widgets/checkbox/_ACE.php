<?php
namespace kordar\yak\widgets\checkbox;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class _ACE extends AbstractCheckbox
{
    public function options(\yii\web\View $view)
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