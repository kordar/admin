<?php
namespace kordar\yak\widgets\form;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;

class Checkbox extends \yii\widgets\InputWidget
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var array
     */
    public $selected = [];

    /**
     * @var
     */
    public $name;

    /**
     * @var string
     */
    public $type = 'html';

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('checkbox');
        $config['class'] = ArrayHelper::getValue($config, 'options.class', 'minimal');

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'widget' => $this, 'config' => $config]);
        return $obj->render();
    }
}