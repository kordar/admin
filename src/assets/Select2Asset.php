<?php
namespace kordar\yak\assets;

/**
 * Class Select2Asset
 * @package kordar\yak\assets
 * @item *:Select2Asset
 */
class Select2Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/select2';

    public $css = [
        'dist/css/select2.min.css'
    ];

    public $js = [
        'dist/js/select2.full.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}