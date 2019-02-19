<?php
namespace kordar\yak\widgets\chosen;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class Chosen extends InputWidget
{
    public $items = [];

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('checkbox');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\chosen\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $obj AbstractChosen
         */
        $obj = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return Html::activeDropDownList($this->model, $this->attribute, $this->items, $obj->options($this->view));
    }
}