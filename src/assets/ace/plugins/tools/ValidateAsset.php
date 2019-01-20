<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;

class ValidateAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.validate.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}