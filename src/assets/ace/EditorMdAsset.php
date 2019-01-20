<?php
namespace kordar\yak\assets\ace;

class EditorMdAsset extends \kordar\editormd\EditorMdAsset
{
    public $depends = [
        'kordar\yak\assets\ace\AceAsset',
    ];
}