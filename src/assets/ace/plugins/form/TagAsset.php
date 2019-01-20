<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class TagAsset extends AceBundleAsset
{
    public $js = [
        'js/bootstrap-tag.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}