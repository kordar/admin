<?php
namespace kordar\yak\assets\lte3;

use yii\web\AssetBundle;

/**
 * Configuration for Ace Admin client script files
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@kordar/yak/resource/lte';

    public $css = [
        'yak.css'
    ];

    public $js = [
        'yak.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'kordar\yak\assets\lte3\Lte3Asset'
    ];
}