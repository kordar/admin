<?php
namespace kordar\yak\widgets\sidebar;

abstract class AbstractSidebar
{
    public $config = [];

    public function beforeRender()
    {
        return '';
    }

    public function afterRender()
    {
        return '';
    }

    abstract public function render(\yii\web\View $view, $tree, $link);
}