<?php

namespace kordar\yak\_ace\assets;

class UploadAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@kordar/ace/assets/web';

    public $js = [
        'js/kordar.upload.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kordar\yak\assets\BootboxAsset',
    ];
}