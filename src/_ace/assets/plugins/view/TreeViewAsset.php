<?php
namespace kordar\yak\_ace\assets\plugins\view;

use kordar\yak\_ace\assets\AceBundleAsset;

class TreeViewAsset extends AceBundleAsset
{
    public $js = [
        'js/tree.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\ace\FontAwesomeAsset',
    ];
}