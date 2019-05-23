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

        $cls = $key;
        if (!is_numeric($cls)) {
            $cls = ord($key);
        }

        $class = ['alert-success', 'alert-info', 'alert-warning', 'alert-danger'];
        return !isset($params[$key]) ? $this->nullDisplay : Html::tag('i', $params[$key], ['class' => $class[$cls % 4]]);
    }

    public function asIcon($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return Html::tag('span', '', ['class' => "fa {$value}"]);
    }

    public function asThumb30($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return Html::img($value, ['width' => 30]);
    }

    public function asDehtml($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return html_entity_decode($value);
    }

}