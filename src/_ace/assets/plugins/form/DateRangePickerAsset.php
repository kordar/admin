<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

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