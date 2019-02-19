<?php
namespace kordar\yak\widgets\radio;


abstract class AbstractRadio extends \yii\base\BaseObject
{
    public $config = [];

    abstract public function options(\yii\web\View $view);
}