<?php

namespace kordar\yak\widgets;

/**
 * Class YakWidget
 * @package kordar\yak\widgets
 * @item *:YakWidget
 */
abstract class YakWidget extends \yii\base\BaseObject
{
    /**
     * @var $widget null | \yii\bootstrap\Widget | \yii\base\Widget | \yii\widgets\InputWidget | \kordar\yak\widgets\layout\Header | \kordar\yak\widgets\form\Checkbox | \kordar\yak\widgets\layout\Sidebar | \kordar\yak\widgets\form\Select
     */
    public $widget = null;

    /**
     * @var array
     */
    public $config = [];

    /**
     * @return mixed
     */
    abstract public function render();
}