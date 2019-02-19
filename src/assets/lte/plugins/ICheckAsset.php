<?php
namespace kordar\yak\assets\lte\plugins;

use kordar\yak\assets\lte\LteBundleAsset;

class ICheckAsset extends LteBundleAsset
{
    public $css = [
        'plugins/iCheck/all.css'
    ];

    public $js = [
        'plugins/iCheck/icheck.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}