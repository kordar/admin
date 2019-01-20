<?php
namespace kordar\yak\assets\ace\plugins\chart;

use kordar\yak\assets\ace\AceBundleAsset;

class FlotAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.flot.min.js',
        'js/jquery.flot.pie.min.js',
        'js/jquery.flot.resize.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}