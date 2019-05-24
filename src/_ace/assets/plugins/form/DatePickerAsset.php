<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class DatePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-datepicker3.min.css'
    ];

    public $js = [
        'js/bootstrap-datepicker.min.js'
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}