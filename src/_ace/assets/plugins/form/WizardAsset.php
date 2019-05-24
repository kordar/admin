<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

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
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset',
        'kordar\yak\_ace\assets\plugins\tools\ValidateAsset',
        'kordar\yak\_ace\assets\plugins\tools\AdditionalMethodsAsset',
        'kordar\yak\_ace\assets\plugins\tools\BootboxAsset',
        'kordar\yak\_ace\assets\plugins\form\MaskedInputAsset',
    ];
}