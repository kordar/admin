<?php
namespace kordar\yak\assets\lte;

class LteAsset extends LteBundleAsset
{
    public $css = [
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
    ];

    public $js = [
        // javascript compatible script
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/app.min.js',
        'dist/js/demo.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\Html5RespondAsset',
        'kordar\yak\assets\FontAwesomeAsset',
        'kordar\yak\assets\IoniconsAsset',
    ];
}