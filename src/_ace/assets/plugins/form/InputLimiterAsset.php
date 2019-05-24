<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class InputLimiterAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.inputlimiter.min.js'
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}