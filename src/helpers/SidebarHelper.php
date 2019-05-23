<?php

namespace kordar\yak\helpers;

use kordar\yak\models\menu\Menu;
use yii\helpers\ArrayHelper;

class SidebarHelper
{

    static public function getSidebarDropDownList($top = '')
    {
        return ArrayHelper::merge([0 => $top], Menu::setSidebarList());
    }

    static public function getTree()
    {
        $classname = YakConfigHelper::config('yak.sidebar.class', Menu::className());
        $sidebar = \Yii::createObject($classname);
        return $sidebar->sidebarTree();
    }

    public static function linker($actionId = null)
    {
        $actionId = $actionId ?: \Yii::$app->controller->action->id;
        return (\Yii::$app->controller->module->id == \Yii::$app->id) ?
            \Yii::$app->controller->id . '/' . $actionId :
            \Yii::$app->controller->module->id . '/' . \Yii::$app->controller->id . '/' . $actionId;
    }

}