<?php
namespace kordar\yak\_ace\assets\plugins\chart;

use kordar\yak\_ace\assets\AceBundleAsset;

class EasyPieChartAsset extends AceBundleAsset
{
    public $js = [
       'js/jquery.easypiechart.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}