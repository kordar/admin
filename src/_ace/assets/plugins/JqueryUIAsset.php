<?php

namespace kordar\yak\_ace\assets\plugins;

use kordar\yak\_ace\assets\AceBundleAsset;

class JqueryUIAsset extends AceBundleAsset
{
    public $css = [
        'css/jquery-ui.custom.min.css',
    ];

    public $js = [
        ['js/excanvas.min.js', 'condition' => 'lte IE 8'],
        'js/jquery-ui.custom.min.js',
        'js/jquery.ui.touch-punch.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}