<?php
namespace kordar\yak\widgets\layout;

use kordar\yak\helpers\YakConfigHelper;

/**
 * Class Navbar
 * @package kordar\yak\widgets
 * @item *:Navbar
 */
class Navbar extends \yii\bootstrap\Widget
{
    public function run()
    {
        $config = YakConfigHelper::widgetConfig('navbar');
        $config['logo'] = YakConfigHelper::config('yak.site.logo', '<i class="ace-icon fa fa-leaf"></i>');
        $config['title'] = YakConfigHelper::config('yak.site.title', 'Yak Admin');
        $config['default-avatar'] = YakConfigHelper::config('yak.default-avatar', '#');

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'config' => $config, 'widget' => $this]);
        return $obj->render();
    }
}