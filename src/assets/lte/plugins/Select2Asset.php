<?php
namespace kordar\yak\assets\lte\plugins;

use kordar\yak\assets\lte\LteBundleAsset;

class Select2Asset extends LteBundleAsset
{
    public $css = [
        'plugins/select2/select2.min.css'
    ];

    public $js = [
        'plugins/select2/select2.full.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}