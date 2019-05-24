<?php

namespace kordar\yak\_ace\assets\plugins;

use kordar\yak\_ace\assets\AceBundleAsset;

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
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}