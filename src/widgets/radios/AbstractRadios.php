<?php
namespace kordar\yak\widgets\radios;


abstract class AbstractRadios extends \yii\base\BaseObject
{
    public $config = [];

    abstract public function render(\yii\web\View $view);
}