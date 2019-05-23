<?php
namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

class BootboxAsset extends AceBundleAsset
{
    public $js = [
        'js/bootbox.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}