<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class DatePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-datepicker3.min.css'
    ];

    public $js = [
        'js/bootstrap-datepicker.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}