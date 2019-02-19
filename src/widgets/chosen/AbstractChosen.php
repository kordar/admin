<?php
namespace kordar\yak\widgets\chosen;


abstract class AbstractChosen extends \yii\base\BaseObject
{
    public $config = [];

    abstract public function options(\yii\web\View $view);
}