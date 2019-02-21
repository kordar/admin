<?php
namespace kordar\yak\assets\lte3;

class AuthAsset extends Lte3BundleAsset
{
    public $css = [];

    public $js = [];

    public $depends = [
        'kordar\yak\assets\lte3\Lte3Asset',
        'kordar\yak\assets\lte3\plugins\ICheckAsset',
    ];
}