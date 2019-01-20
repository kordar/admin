<?php
namespace kordar\yak\helpers;

use yii\helpers\ArrayHelper;

class ConfigHelper
{
    public static function config($field, $default = [])
    {
        return ArrayHelper::getValue(\Yii::$app->params['yak'], $field, $default);
    }

    /**
     * @param $sign
     * @param array $default
     * @return array
     * $params = [
     *      'navbar' => [
     *          'class' => 'aa\bb\W',
     *      ]
     * ]
     */
    public static function widgetConfig($sign, $default = [])
    {
        if (isset(\Yii::$app->params['yak']['widgets'][$sign])) {
            return \Yii::$app->params['yak']['widgets'][$sign];
        }
        return $default;
    }
}