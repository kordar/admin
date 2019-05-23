<?php
namespace kordar\yak\widgets\datatables;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class _LTE extends AbstractDataTables
{
    protected function renderThead()
    {
        $thead = array_map(function ($val) {
            return '<th>' . $val . '</th>';
        }, $this->thead);
        return '<tr>' . implode("\n", $thead) . '</tr>';
    }

    protected function renderTfoot()
    {
        $tfoot = array_map(function ($val) {
            return '<td>' . $val . '</td>';
        }, $this->tfoot);
        return '<tr>' . implode("\n", $tfoot) . '</tr>';
    }

    public function beforeRender()
    {
        return '<table id="' . $this->config['id'] . '" class="table table-bordered table-hover">';
    }

    public function afterRender()
    {
        return '</table>';
    }

    public function render(\yii\web\View $view)
    {
        $tbody = array_map(function ($row) {

            $r = '<tr>';
            foreach ($row as $val) {
                $r .= '<td>' . $val . '</td>';
            }
            return $r . '</tr>';

        }, $this->tbody);

        \kordar\yak\assets\lte\plugins\DataTableAsset::register($view);

        $view->registerJs('$(\'#' . $this->config['id'] . '\').DataTable(' . json_encode($this->config['tableConfig']) . ')');

        return strtr('<thead>{thead}</thead><tbody>{tbody}</tbody><tfoot>{tfoot}</tfoot>', [
            '{tbody}' => implode("\n", $tbody),
            '{thead}' => $this->renderThead(),
            '{tfoot}' => $this->renderTfoot()
        ]);
    }
}
