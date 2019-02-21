<?php
namespace kordar\yak\assets\lte3\plugins;

use kordar\yak\assets\lte3\Lte3BundleAsset;

class ICheckAsset extends Lte3BundleAsset
{
    public $css = [
        'plugins/iCheck/all.css'
    ];

    public $js = [
        'plugins/iCheck/icheck.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kordar\yak\assets\FontAwesomeAsset',
        'kordar\yak\assets\IoniconsAsset',
    ];
}