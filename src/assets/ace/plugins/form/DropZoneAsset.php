<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class DropZoneAsset extends AceBundleAsset
{
    public $css = [
        'css/dropzone.min.css'
    ];

    public $js = [
        'js/dropzone.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\ace\FontAwesomeAsset',
    ];
}