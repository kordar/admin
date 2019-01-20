<?php
namespace kordar\yak\assets\ace\plugins;

use kordar\yak\assets\ace\AceBundleAsset;

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