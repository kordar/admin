<?php
namespace kordar\yak\widgets\checkbox;

use kordar\yak\helpers\YakConfigHelper;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class HtmlCheckbox extends Widget
{
    public $items = [];

    public $selected = [];

    public $name;

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('checkbox');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\checkbox\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $obj AbstractCheckbox
         */
        $obj = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return Html::checkboxList($this->name, $this->selected, $this->items, $obj->options($this->view));
    }
}