<?php
namespace kordar\yak\assets\lte3;

class AuthAsset extends Lte3BundleAsset
{
    public $css = [
        'dist/css/adminlte.min.css',
        'plugins/iCheck/square/blue.css'
    ];

    public $js = [
        // javascript compatible script
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.js',
        'plugins/iCheck/icheck.min.js',
        // 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kordar\yak\assets\FontAwesomeAsset',
        'kordar\yak\assets\IoniconsAsset',
    ];
}