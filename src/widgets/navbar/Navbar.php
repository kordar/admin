<?php
namespace kordar\yak\widgets\navbar;

use kordar\ace\models\admin\Admin;
use kordar\yak\helpers\ConfigHelper;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class Navbar extends Widget
{
    public function run()
    {
        $config = ConfigHelper::widgetConfig('navbar');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\navbar\_' . strtoupper($GLOBALS['yak_sign']));
        $identity = \Yii::$app->user->identity;

        /**
         * @var $navigation AbstractNavbar
         */
        $navigation = \Yii::createObject(['class' => $classname, 'config' => $config, 'user' => $identity]);
        return $navigation->beforeRender() . $navigation->render($this->view) . $navigation->afterRender();
    }
}