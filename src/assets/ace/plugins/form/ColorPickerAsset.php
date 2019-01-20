<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class ColorPickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-colorpicker.min.css'
    ];

    public $js = [
        'js/bootstrap-colorpicker.min.js',
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}