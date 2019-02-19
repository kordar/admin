<?php
namespace kordar\yak\widgets\radios;


abstract class AbstractRadios extends \yii\base\BaseObject
{
    public function beforeRender()
    {
        return '';
    }

    public function afterRender()
    {
        return '';
    }

    abstract public function render(\yii\web\View $view);
}