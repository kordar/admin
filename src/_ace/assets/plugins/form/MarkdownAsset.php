<?php

namespace kordar\yak\_ace\assets\plugins\form;

use kordar\yak\_ace\assets\AceBundleAsset;

class MarkdownAsset extends AceBundleAsset
{
    public $js = [
        'js/markdown.min.js',
        'js/bootstrap-markdown.min.js'
    ];

    public $depends = [
        'kordar\yak\_ace\assets\plugins\JqueryUIAsset'
    ];
}