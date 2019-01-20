<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;;

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
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}