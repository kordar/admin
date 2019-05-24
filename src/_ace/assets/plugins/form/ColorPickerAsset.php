<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class ColorPickerAsset extends AceBundleAsset
{
    public $css = [
        'css/bootstrap-colorpicker.min.css'
    ];

    public $js = [
        'js/bootstrap-colorpicker.min.js',
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}