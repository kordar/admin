<?php
namespace kordar\yak\_ace\assets\plugins;

use kordar\yak\_ace\assets\AceBundleAsset;

class CalendarAsset extends AceBundleAsset
{
    public $css = [
        'css/fullcalendar.min.css'
    ];

    public $js = [
        'js/moment.min.js',
        'js/fullcalendar.min.js',
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset',
        'kordar\yak\assets\ace\plugins\tools\BootboxAsset',
    ];
}