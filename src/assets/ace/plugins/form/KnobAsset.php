<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class KnobAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.knob.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}