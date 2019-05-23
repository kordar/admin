<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class KnobAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.knob.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}