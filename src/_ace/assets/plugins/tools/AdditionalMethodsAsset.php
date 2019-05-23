<?php
namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;


class AdditionalMethodsAsset extends AceBundleAsset
{
    public $js = [
        'jquery-additional-methods.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}