<?php
namespace kordar\yak\helpers;

use yii\helpers\ArrayHelper;

class YakConfigHelper
{
    public static function config($field, $default = [])
    {
        return ArrayHelper::getValue(\Yii::$app->params, $field, $default);
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
        $config = $default;
        if (isset(\Yii::$app->params['yak.widgets.' . $sign])) {
            $config = \Yii::$app->params['yak.widgets.' . $sign];
        }
        $config['classname'] = ArrayHelper::getValue($config, 'class',
            'kordar\\yak\\_' . $GLOBALS['yak_sign'] . '\\widgets\\' . ucfirst($sign)
        );
        return $config;
    }
}