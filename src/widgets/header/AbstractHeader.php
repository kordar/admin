<?php
namespace kordar\yak\widgets\header;


abstract class AbstractHeader extends \yii\base\BaseObject
{
    public $config = [];

    public $info = [];

    abstract public function render(\yii\web\View $view);
}