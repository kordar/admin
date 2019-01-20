<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class TimePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-timepicker.min.css'
    ];

    public $js = [
        'js/bootstrap-timepicker.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}