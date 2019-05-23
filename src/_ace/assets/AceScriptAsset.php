<?php
namespace kordar\yak\_ace\assets;

/**
 * Configuration for Ace Admin client script files
 */
class AceScriptAsset extends AceBundleAsset
{
    public $js = [
        // ace scripts
        'js/ace-elements.min.js',
        'js/ace.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
