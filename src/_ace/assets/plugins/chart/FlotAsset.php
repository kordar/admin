<?php
namespace kordar\yak\_ace\assets\plugins\chart;

use kordar\yak\_ace\assets\AceBundleAsset;

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