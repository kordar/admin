<?php
namespace kordar\yak\assets;

use yii\web\AssetBundle;
use yii\web\View;

class Html5RespondAsset extends AssetBundle
{
    public $sourcePath = '@bower/yak-assets/html5';

    public $js = [
        ['html5shiv.min.js', 'condition'=>'lte IE 8', 'position' => View::POS_HEAD],
        ['respond.min.js', 'condition'=>'lte IE 8', 'position' => View::POS_HEAD],
    ];
}