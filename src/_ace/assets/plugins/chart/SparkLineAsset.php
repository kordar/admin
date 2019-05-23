<?php
namespace kordar\yak\_ace\assets\plugins\chart;

use kordar\yak\_ace\assets\AceBundleAsset;

class SparkLineAsset extends AceBundleAsset
{
    public $js = [
       'js/jquery.sparkline.index.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}