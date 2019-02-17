<?php
namespace kordar\yak\libs;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class YakActionColumn extends ActionColumn
{
    public $template = '{view} / {update} / {delete}';

    public $buttonUrls = [];

    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yak', 'View');
                        break;
                    case 'update':
                        $title = Yii::t('yak', 'Update');
                        break;
                    case 'delete':
                        $title = Yii::t('yak', 'Delete');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);

                if (isset($this->buttonUrls[$name])) {
                    $url = $this->customerUrl(ArrayHelper::getValue($this->buttonUrls[$name], 'url'), ArrayHelper::getValue($this->buttonUrls[$name], 'attributes', []), $model);
                }

                return Html::a($title, $url, $options);
            };
        }
    }

    protected function customerUrl($url, $attributes, $model)
    {
        $params = [];
        foreach ($attributes as $key => $attribute) {
            $params[$key] = $model->$attribute;
        }
        array_unshift($params, $url);
        return $params;
    }
}