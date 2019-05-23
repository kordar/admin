<?php
namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

class NestableAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.nestable.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}