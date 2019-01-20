<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;

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
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}