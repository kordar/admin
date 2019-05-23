<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

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