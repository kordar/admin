<?php
namespace kordar\yak\assets\ace\plugins\view;

use kordar\yak\assets\ace\AceBundleAsset;

class PrettifyAsset extends AceBundleAsset
{
    public $css = [
        'css/prettify.min.css'
    ];

    public $js = [
        'js/prettify.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\ace\FontAwesomeAsset',
    ];
}