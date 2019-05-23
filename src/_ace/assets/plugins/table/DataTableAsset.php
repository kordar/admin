<?php
namespace kordar\yak\_ace\assets\plugins\table;

use kordar\yak\_ace\assets\AceBundleAsset;

class DataTableAsset extends AceBundleAsset
{
    public $css = [];

    public $js = [
        'js/jquery.dataTables.min.js',
        'js/jquery.dataTables.bootstrap.min.js',
        'js/dataTables.buttons.min.js',
        'js/buttons.flash.min.js',
        'js/buttons.html5.min.js',
        'js/buttons.print.min.js',
        'js/buttons.colVis.min.js',
        'js/dataTables.select.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'kordar\yak\assets\FontAwesomeAsset',
    ];
}