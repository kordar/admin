<?php
namespace kordar\yak\widgets\navbar;

use kordar\yak\helpers\YakConfigHelper;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class Navbar extends Widget
{
    public function run()
    {
        $config = YakConfigHelper::widgetConfig('navbar');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\navbar\_' . strtoupper($GLOBALS['yak_sign']));
        $identity = \Yii::$app->user->identity;

        /**
         * @var $navigation AbstractNavbar
         */
        $navigation = \Yii::createObject(['class' => $classname, 'config' => $config, 'user' => $identity]);
        return $navigation->beforeRender() . $navigation->render($this->view) . $navigation->afterRender();
    }
}