<?php
namespace kordar\yak\assets;

/**
 * Class DataTableAsset
 * @package kordar\yak\assets
 * @item *:DataTableAsset
 */
class DataTableAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/yak-assets/datatables';

    public $css = [
        'datatables.net-bs/css/dataTables.bootstrap.min.css'
    ];

    public $js = [
        'datatables.net/js/jquery.dataTables.min.js',
        'datatables.net-bs/js/dataTables.bootstrap.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}