<?php

namespace kordar\yak\assets;

/**
 * Class ViewerJsAsset
 * @package kordar\yak\assets
 */
class ViewerJsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/Viewer.js';

    public $css = [
        'css/viewer.min.css'
    ];

    public $js = [
        'js/viewer-jquery.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}