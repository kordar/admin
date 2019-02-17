<?php
namespace kordar\yak\assets\ace;

use yii\web\View;

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
