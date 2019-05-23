<?php

namespace kordar\yak\widgets\layout;

use kordar\yak\helpers\SidebarHelper;
use kordar\yak\helpers\YakConfigHelper;

/**
 * Class Sidebar
 * @package kordar\yak\widgets
 * @item *:Sidebar
 */
class Sidebar extends \yii\bootstrap\Widget
{
    /**
     * @var
     */
    public $link;

    /**
     * @var
     */
    public $tree;

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('sidebar');
        $config['default-avatar'] = YakConfigHelper::config('yak.default-avatar', '#');

        if ($this->link === '') {
            $this->link = SidebarHelper::linker();
        } elseif (strpos($this->link, '#') !== false) {
            $this->link = SidebarHelper::linker(ltrim($this->link, '#'));
        }

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'config' => $config, 'widget' => $this]);
        return $obj->render();
    }
}