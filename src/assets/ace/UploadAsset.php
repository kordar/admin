<?php
namespace kordar\yak\assets\ace;

class UploadAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@kordar/ace/assets/web';

    public $js = [
        'js/kordar.upload.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kordar\yak\assets\ace\plugins\tools\BootboxAsset',
    ];
}