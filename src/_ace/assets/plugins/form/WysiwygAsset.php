<?php
namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class WysiwygAsset extends AceBundleAsset
{
    public $js = [
        'js/bootstrap-wysiwyg.min.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}