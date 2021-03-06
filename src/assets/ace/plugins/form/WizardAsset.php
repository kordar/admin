<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class WizardAsset extends AceBundleAsset
{
    public $css = [
        'css/select2.min.css'
    ];

    public $js = [
        'js/wizard.min.js',
        'js/select2.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset',
        'kordar\yak\assets\ace\plugins\tools\ValidateAsset',
        'kordar\yak\assets\ace\plugins\tools\AdditionalMethodsAsset',
        'kordar\yak\assets\ace\plugins\tools\BootboxAsset',
        'kordar\yak\assets\ace\plugins\form\MaskedInputAsset',
    ];
}