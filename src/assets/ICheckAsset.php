<?php
namespace kordar\yak\assets;

/**
 * Class ICheckAsset
 * @package kordar\yak\assets
 * @item *:ICheckAsset
 */
class ICheckAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/iCheck';

    public $css = [
        'all.css',
    ];

    public $js = [
        'icheck.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}