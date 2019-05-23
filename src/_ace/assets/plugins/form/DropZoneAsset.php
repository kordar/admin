<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

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