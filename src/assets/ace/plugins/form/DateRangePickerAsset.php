<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class DateRangePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/daterangepicker.min.css'
    ];

    public $js = [
        'js/moment.min.js',
        'js/daterangepicker.min.js',
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}