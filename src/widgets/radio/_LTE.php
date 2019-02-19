<?php
namespace kordar\yak\widgets\radio;

use kordar\yak\assets\lte\plugins\ICheckAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class _LTE extends AbstractRadio
{
    public function options(\yii\web\View $view)
    {
        // TODO: Implement render() method.

        ICheckAsset::register($view);

        $view->registerJs(' //iCheck for checkbox and radio inputs
            $(\'input[type="radio"].minimal\').iCheck({
              checkboxClass: \'icheckbox_minimal-blue\',
              radioClass: \'iradio_minimal-blue\'
            });
            //Red color scheme for iCheck
            $(\'input[type="radio"].minimal-red\').iCheck({
              checkboxClass: \'icheckbox_minimal-red\',
              radioClass: \'iradio_minimal-red\'
            });
            //Flat red color scheme for iCheck
            $(\'input[type="radio"].flat-red\').iCheck({
              checkboxClass: \'icheckbox_flat-green\',
              radioClass: \'iradio_flat-green\'
            });');

        return [
            'class'=>'form-group form-control auto-height',
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::radio($name, $checked, array_merge(['class' => ArrayHelper::getValue($this->config, 'options.class', 'minimal')], [
                    'value' => $value, 'label' => Html::encode(' ' . $label)
                ]));
            }
        ];
    }
}
