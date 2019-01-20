<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class ChosenAsset extends AceBundleAsset
{
    public $css = [
        'css/chosen.min.css'
    ];

    public $js = [
        'js/chosen.jquery.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}