<?php
namespace kordar\yak\widgets\layout;

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

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'config' => $config, 'widget' => $this]);
        return $obj->render();
    }
}