<?php

namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

/**
 * Class SpinAsset
 * @package kordar\ace\web\assets\plugins\tools
 */
class SpinAsset extends AceBundleAsset
{
    public $js = [
        'js/spin.js'
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}