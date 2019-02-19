<?php
namespace kordar\yak\widgets\radios;

use kordar\yak\helpers\YakConfigHelper;
use yii\bootstrap\InputWidget;
use yii\helpers\ArrayHelper;

class Radios extends InputWidget
{
    public static function options()
    {
        $config = YakConfigHelper::widgetConfig('radios');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\radios\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $obj AbstractRadios
         */
        $obj = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return $obj->render();
    }
}