<?php
namespace kordar\yak\assets;

class EditorMdAsset extends \kordar\editormd\EditorMdAsset
{
    public $depends = [
        'kordar\yak\assets\ace\AceAsset',
    ];
}