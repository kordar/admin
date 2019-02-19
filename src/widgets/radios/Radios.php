<?php
namespace kordar\yak\widgets\radios;

use kordar\yak\helpers\YakConfigHelper;
use yii\bootstrap\InputWidget;
use yii\helpers\ArrayHelper;

class Radios extends InputWidget
{
    public function run()
    {
        $config = YakConfigHelper::widgetConfig('radios');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\radios\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $navigation AbstractRadios
         */
        $navigation = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return $navigation->beforeRender() . $navigation->render($this->view) . $navigation->afterRender();
    }
}