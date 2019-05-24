<?php

namespace kordar\yak\widgets\form;

use kordar\yak\helpers\YakConfigHelper;

class Select extends \yii\widgets\InputWidget
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var string
     */
    public $dataPlaceholder = 'please choose ...';

    /**
     * @var string
     */
    public $type = 'select';

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('select');

        /**
         * @var $obj \kordar\yak\widgets\YakWidget
         */
        $obj = \Yii::createObject(['class' => $config['classname'], 'widget' => $this, 'config' => $config]);
        return $obj->render();
    }
}