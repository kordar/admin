<?php
namespace kordar\yak\widgets\radio;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class Radio extends InputWidget
{
    public $items = [];

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('radios');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\radio\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $obj AbstractRadio
         */
        $obj = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return Html::activeRadioList($this->model, $this->attribute, $this->items, $obj->options($this->view));
    }
}