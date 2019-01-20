<?php
namespace kordar\yak\widgets\sidebar;

use kordar\yak\helpers\ConfigHelper;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;

class Sidebar extends Widget
{
    public $link;

    public $tree;

    public function run()
    {
        $config = ConfigHelper::widgetConfig('sidebar');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\sidebar\_' . strtoupper($GLOBALS['yak_sign']));

        /**
         * @var $navigation AbstractSidebar
         */
        $navigation = \Yii::createObject(['class' => $classname, 'config' => $config]);
        return $navigation->beforeRender() . $navigation->render($this->view, $this->tree, $this->link) . $navigation->afterRender();
    }
}