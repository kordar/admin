<?php
namespace kordar\yak\assets;

use kordar\yak\assets\ace\AceBundleAsset;

class WDatePicketAsset extends AceBundleAsset
{
    public $sourcePath = '@kordar/yak/resource/My97DatePicker';

    public $js = [
        'WdatePicker.js'
    ];

    public $depends = [];
}