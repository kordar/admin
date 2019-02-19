<?php
namespace kordar\yak\helpers;

use yii\helpers\Html;

/**
 * Class YakHelper
 * @package kordar\yak\helpers
 */
class YakHelper
{
    /**
     * @param $code
     * @param string $message
     * set Yii::$app->setFlash
     */
    public static function setFlash($code, $message = '')
    {
        \Yii::$app->session->setFlash($code, \Yii::t('yak', $message));
    }

    public static function dropDownListYOrN()
    {
        return [
            0 => \Yii::t('yak', 'No'), 1 => \Yii::t('yak', 'Yes')
        ];
    }

    public static function dropDownListActive()
    {
        return [
            0 => \Yii::t('yak', 'Not Activated'), 1 => \Yii::t('yak', 'Activating')
        ];
    }



    public static function extSelectCase($options = [])
    {
        $params = [];
        foreach ($options as $field => $option) {
            $str = '';
            foreach ($option['items'] as $key => $item) {
                $str .= " WHEN $key THEN '$item'";
            }
            $params[] = "(CASE `$field` $str END) AS {$option['alias']}";
        }
        return $params;
    }

    public static function radioListOptions()
    {
        return [
            'class'=>'radio form-control',
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::radio($name, $checked, array_merge(['class' => 'ace'], [
                    'value' => $value,
                    'label' => Html::tag('span', Html::encode(' ' . $label), ['class'=>'lbl'])
                ]));
            }
        ];
    }

    public static function checkboxListOptions()
    {
        return [
            'item' => function($index, $label, $name, $checked, $value) {
                return Html::checkbox($name, $checked, array_merge(['class' => 'ace ace-checkbox-2'], [
                    'value' => $value,
                    'label' => Html::tag('span', Html::encode(' ' . $label), ['class'=>'lbl'])
                ]));
            }
        ];
    }

    public static function renderLinker($title, $url, $options, $icon = '')
    {
        $icon = empty($icon) ? '' : Html::tag('i', '', ['class' => 'fa ' . $icon . ' bigger-110']);
        return Html::a("{$icon} {$title}", $url, $options);
    }
}