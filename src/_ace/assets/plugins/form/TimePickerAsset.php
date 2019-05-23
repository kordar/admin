<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

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