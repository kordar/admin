<?php
namespace kordar\yak\widgets\form;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;

class Radio extends \yii\widgets\InputWidget
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var string
     */
    public $type = '';

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('radio');
        $config['class'] = ArrayHelper::getValue($config, 'options.class', 'minimal');

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'widget' => $this, 'config' => $config]);
        return $obj->render();
    }
}