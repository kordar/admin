<?php
namespace kordar\yak\widgets\navbar;


abstract class AbstractNavbar extends \yii\base\BaseObject
{
    public $config = [];

    /**
     * @var $user \kordar\yak\models\admin\User
     */
    public $user;

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