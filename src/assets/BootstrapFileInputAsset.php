<?php
namespace kordar\yak\assets;

use yii\web\AssetBundle;

class BootstrapFileInputAsset extends AssetBundle
{
    public $sourcePath = '@bower/yak-assets/bootstrap-fileinput';

    public $js = [
        'js/plugins/piexif.js',
        'js/plugins/sortable.js',
        'js/fileinput.js',
        'js/locales/zh.js',
        //'themes/fas/theme.js',
        //'themes/explorer-fas/theme.js',
    ];

    public $css = [
        // 4.7.0版本Font Awesome 参考地址：http://www.fontawesome.com.cn/
        'css/fileinput.css',
        'themes/explorer-fas/theme.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}