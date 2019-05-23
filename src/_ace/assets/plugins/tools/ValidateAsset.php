<?php
namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

class ValidateAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.validate.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}