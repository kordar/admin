<?php
namespace kordar\yak\_ace\assets\plugins\table;

use kordar\yak\_ace\assets\AceBundleAsset;

class JqGridAsset extends AceBundleAsset
{
    public $css = [
        'css/jquery-ui.min.css',
        'css/bootstrap-datepicker3.min.css',
        'css/ui.jqgrid.min.css'
    ];

    public $js = [
        'js/bootstrap-datepicker.min.js',
        'js/jquery.jqGrid.min.js',
        'js/grid.locale-en.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}