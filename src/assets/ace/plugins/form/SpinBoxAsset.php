<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class SpinBoxAsset extends AceBundleAsset
{
    public $js = [
        'js/spinbox.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}