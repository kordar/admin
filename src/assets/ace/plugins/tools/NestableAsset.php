<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;

class NestableAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.nestable.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}