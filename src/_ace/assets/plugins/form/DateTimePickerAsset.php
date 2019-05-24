<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class DateTimePickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-datetimepicker.min.css'
    ];

    public $js = [
        'js/bootstrap-datetimepicker.min.js',
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}