<?php
namespace kordar\yak\assets\lte;

class AuthAsset extends LteBundleAsset
{
    public $css = [
        'dist/css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css',
    ];

    public $js = [
        'plugins/iCheck/icheck.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'kordar\yak\assets\FontAwesomeAsset',
        'kordar\yak\assets\IoniconsAsset',
    ];
}