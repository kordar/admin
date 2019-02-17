<?php
namespace kordar\yak\libs;

use yii\helpers\Html;
use yii\i18n\Formatter;

class YakFormatter extends Formatter
{
    public function asSelected($key, $params)
    {
        if ($key === null) {
            return $this->nullDisplay;
        }

        $class = ['alert-success', 'alert-info', 'alert-warning', 'alert-danger'];
        return !isset($params[$key]) ? $this->nullDisplay : Html::tag('i', $params[$key], ['class' => $class[$key % 4]]);
    }

    public function asIcon($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return Html::tag('span', '', ['class' => "fa {$value}"]);
    }
}