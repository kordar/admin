<?php
namespace kordar\yak\assets;

/**
 * Class WDatePicketAsset
 * @package kordar\yak\assets
 * @item *:WDatePicketAsset
 */
class WDatePicketAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/My97DatePicker';

    public $js = [
        'WdatePicker.js'
    ];

    public $depends = [];
}