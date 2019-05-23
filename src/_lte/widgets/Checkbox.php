<?php
namespace kordar\yak\_lte\widgets;

use kordar\yak\assets\ICheckAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

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

        ICheckAsset::register($this->widget->view);

        $this->widget->view->registerJs(' //iCheck for checkbox and radio inputs
            $(\'input[type="checkbox"].minimal\').iCheck({
              checkboxClass: \'icheckbox_minimal-blue\',
              radioClass: \'iradio_minimal-blue\'
            });
            //Red color scheme for iCheck
            $(\'input[type="checkbox"].minimal-red\').iCheck({
              checkboxClass: \'icheckbox_minimal-red\',
              radioClass: \'iradio_minimal-red\'
            });
            //Flat red color scheme for iCheck
            $(\'input[type="checkbox"].flat-red\').iCheck({
              checkboxClass: \'icheckbox_flat-green\',
              radioClass: \'iradio_flat-green\'
            });');

        return [
            'class'=>'form-group form-control auto-height',
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::checkbox($name, $checked, array_merge(['class' => $this->config['class']], [
                    'value' => $value, 'label' => Html::encode(' ' . $label)
                ]));
            }
        ];
    }
}
