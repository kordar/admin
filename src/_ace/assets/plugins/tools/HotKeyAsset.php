<?php
namespace kordar\yak\_ace\assets\plugins\tools;

use kordar\yak\_ace\assets\AceBundleAsset;

class HotKeyAsset extends AceBundleAsset
{
    public $js = [
        'js/jquery.hotkeys.index.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}