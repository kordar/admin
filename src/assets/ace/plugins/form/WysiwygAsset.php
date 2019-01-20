<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class WysiwygAsset extends AceBundleAsset
{
    public $js = [
        'js/bootstrap-wysiwyg.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}