<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class DateTimePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-datetimepicker.min.css'
    ];

    public $js = [
        'js/bootstrap-datetimepicker.min.js',
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}