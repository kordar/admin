<?php
namespace kordar\yak\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/yak-assets/font-awesome/4.7.0';

    public $css = [
        // 4.7.0版本Font Awesome 参考地址：http://www.fontawesome.com.cn/
        'css/font-awesome.min.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}