<?php
namespace kordar\yak\widgets\checkbox;


abstract class AbstractCheckbox extends \yii\base\BaseObject
{
    public $config = [];

    abstract public function options(\yii\web\View $view);
}