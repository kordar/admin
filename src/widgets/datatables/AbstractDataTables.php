<?php
namespace kordar\yak\widgets\datatables;


abstract class AbstractDataTables extends \yii\base\BaseObject
{
    public $config = [];

    /**
     * @var array
     */
    public $thead = [];

    /**
     * @var array
     */
    public $tbody = [];

    /**
     * @var array
     */
    public $tfoot = [];

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