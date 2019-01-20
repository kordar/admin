<?php
namespace kordar\yak\assets\ace\plugins\chart;

use kordar\yak\assets\ace\AceBundleAsset;

class EasyPieChartAsset extends AceBundleAsset
{
    public $js = [
       'js/jquery.easypiechart.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}