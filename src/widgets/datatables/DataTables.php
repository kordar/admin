<?php
namespace kordar\yak\widgets\datatables;

use kordar\yak\helpers\YakConfigHelper;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class DataTables extends Widget
{
    /**
     * @var array
     */
    public $thead = [];

    /**
     * @var array
     */
    public $tbody = [];

    /**
     * @var array
     */
    public $tfoot = [];

    /**
     * @var array
     */
    public $tableConfig = [
        'paging' => true,
        'lengthChange' => false,
        'searching' => false,
        'ordering' => true,
        'info' => true,
        'autoWidth' => false
    ];

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('datatables');
        $classname = ArrayHelper::getValue($config, 'class', 'kordar\yak\widgets\datatables\_' . strtoupper($GLOBALS['yak_sign']));
        $config['id'] = $this->id;
        $config['tableConfig'] = $this->tableConfig;

        /**
         * @var $navigation AbstractDataTables
         */
        $navigation = \Yii::createObject([
            'class' => $classname, 'config' => $config,
            'thead' => $this->thead, 'tbody' => $this->tbody, 'tfoot' => $this->tfoot,
        ]);
        return $navigation->beforeRender() . $navigation->render($this->view) . $navigation->afterRender();
    }
}