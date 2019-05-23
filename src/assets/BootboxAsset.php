<?php
namespace kordar\yak\assets;

/**
 * Class BootboxAsset
 * @package kordar\yak\assets
 * @item *:BootboxAsset
 */
class BootboxAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/bootbox';

    public $js = [
        'bootbox.min.js',
        'bootbox.locales.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}