<?php

namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

/**
 * Class GritterAsset
 * @package kordar\ace\web\assets\plugins\tools
 */
class GritterAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.gritter.min.js'
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}