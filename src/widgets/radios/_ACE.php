<?php
namespace kordar\yak\widgets\radios;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\YakConfigHelper;

class _ACE extends AbstractRadios
{
    public function render(\yii\web\View $view)
    {
        // TODO: Implement render() method.
        return [
            'class'=>'radio form-control',
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::radio($name, $checked, array_merge(['class' => 'ace'], [
                    'value' => $value,
                    'label' => Html::tag('span', Html::encode(' ' . $label), ['class'=>'lbl'])
                ]));
            }
        ];
    }
}