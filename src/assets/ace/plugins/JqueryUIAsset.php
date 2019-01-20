<?php
namespace kordar\yak\assets\ace\plugins;

use kordar\yak\assets\ace\AceBundleAsset;

class JqueryUIAsset extends AceBundleAsset
{
    public $css = [
        'css/jquery-ui.custom.min.css',
    ];

    public $js = [
        ['js/excanvas.min.js', 'condition'=>'lte IE 8'],
        'js/jquery-ui.custom.min.js',
        'js/jquery.ui.touch-punch.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\ace\FontAwesomeAsset',
    ];
}