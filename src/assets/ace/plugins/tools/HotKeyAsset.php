<?php
namespace kordar\yak\assets\ace\plugins\tools;

use kordar\yak\assets\ace\AceBundleAsset;

class HotKeyAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.hotkeys.index.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}