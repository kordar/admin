<?php
namespace kordar\yak\_lte\assets;

class AdminLteAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/AdminLTE-2.4.10/dist';

    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/skin-blue.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'
    ];

    public $js = [
        // javascript compatible script
        'js/adminlte.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\Html5RespondAsset',
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}