<?php
namespace kordar\yak\assets\ace\plugins;

use kordar\yak\assets\ace\AceBundleAsset;

class GalleryAsset extends AceBundleAsset
{
    public $css = [
        'css/colorbox.min.css'
    ];

    public $js = [
        'js/jquery.colorbox.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\ace\FontAwesomeAsset',
    ];
}