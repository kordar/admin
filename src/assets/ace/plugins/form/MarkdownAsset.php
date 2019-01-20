<?php
namespace kordar\yak\assets\ace\plugins\form;

use kordar\yak\assets\ace\AceBundleAsset;

class MarkdownAsset extends AceBundleAsset
{
    public $js = [
        'js/markdown.min.js',
        'js/bootstrap-markdown.min.js'
    ];

    public $depends = [
        'kordar\yak\assets\ace\plugins\JqueryUIAsset'
    ];
}