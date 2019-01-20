<?php
namespace kordar\yak\assets\ace;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Configuration for Ace Admin client script files
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@kordar/ace/assets/web';

    public $css = [
        'css/style.css'
    ];

    public $js = [
        'js/tools.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'kordar\yak\assets\ace\AceAsset',
        'kordar\yak\assets\ace\AceScriptAsset',
    ];
}