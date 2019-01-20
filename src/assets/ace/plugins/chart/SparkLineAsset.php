<?php
namespace kordar\yak\assets\ace\plugins\chart;

use kordar\yak\assets\ace\AceBundleAsset;

class SparkLineAsset extends AceBundleAsset
{
    public $js = [
       'js/jquery.sparkline.index.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}