<?php
namespace kordar\yak\widgets\layout;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;

class Header extends \yii\bootstrap\Widget
{
    /**
     * @var
     */
    public $title;  // 标题

    /**
     * @var
     */
    public $subTitle; // 副标题

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('header');

        /**
         * @var $header \kordar\yak\widgets\YakWidget
         */
        $header = \Yii::createObject(['class' => $config['classname'], 'widget' => $this]);
        return $header->render();
    }
}