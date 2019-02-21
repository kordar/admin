<?php
namespace kordar\yak\assets\lte3\plugins;

use kordar\yak\assets\lte3\Lte3BundleAsset;

class Select2Asset extends Lte3BundleAsset
{
    public $css = [
        'plugins/select2/select2.min.css'
    ];

    public $js = [
        'plugins/select2/select2.full.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kordar\yak\assets\FontAwesomeAsset',
        'kordar\yak\assets\IoniconsAsset',
    ];
}