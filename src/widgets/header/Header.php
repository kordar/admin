<?php
namespace kordar\yak\widgets\header;

use kordar\yak\helpers\ConfigHelper;
use yii\helpers\ArrayHelper;

class Header extends \yii\bootstrap\Widget
{
    public $info = [];

    public function run()
    {
        $config = ConfigHelper::widgetConfig('page-header');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\header\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $header AbstractHeader
         */
        $header = \Yii::createObject(['class' => $classname, 'config' => $config, 'info' => $this->info]);
        return $header->render($this->view);
    }
}