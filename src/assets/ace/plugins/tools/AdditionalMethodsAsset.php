<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;


class AdditionalMethodsAsset extends AceBundleAsset
{
    public $js = [
        'jquery-additional-methods.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}