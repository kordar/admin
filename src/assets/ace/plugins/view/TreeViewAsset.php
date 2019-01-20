<?php
namespace kordar\yak\assets\ace\plugins\view;

use kordar\yak\assets\ace\AceBundleAsset;

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