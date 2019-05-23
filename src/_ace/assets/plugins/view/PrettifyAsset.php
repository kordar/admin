<?php
namespace kordar\yak\_ace\assets\plugins\view;

use kordar\yak\_ace\assets\AceBundleAsset;

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