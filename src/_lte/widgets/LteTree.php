<?php
namespace kordar\yak\_lte\widgets;

use yii\helpers\Html;

/**
 * Class LteTree
 * @package kordar\yak\_lte\widgets
 * @item *:LteTree
 */
class LteTree extends \RecursiveIteratorIterator
{
    /**
     * @var string
     */
    public $sideBarHtml = '';

    /**
     * @var string
     */
    public $linker = '';

    public function beginIteration()
    {
        $this->sideBarHtml .= "<ul class=\"sidebar-menu\" data-widget=\"tree\">\n";
    }

    public function beginChildren()
    {
        $this->sideBarHtml .= "<ul class='treeview-menu'>\n";
    }

    public function endChildren()
    {
        $this->sideBarHtml .= "</ul></li>\n";
    }

    public function endIteration()
    {
        $this->sideBarHtml .= "</ul>\n";
    }

    public function createNode($node = [], $isChildren = false)
    {
        $href = '#';
        if (!empty($node['href'])) {
            $href = ['/' . $node['href']];
        }

        if ($isChildren) {
            $li = $node['href'] == $this->linker ? '<li class="active treeview">' : '<li class="treeview">';
            $a = Html::a("<i class=\"fa {$node['icon']}\"></i><span> {$node['title']} </span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span>", $href);
            return $li . $a;
        } else {
            $li = $node['href'] == $this->linker ? '<li class="active">' : '<li>';
            $a = Html::a("<i class=\"fa {$node['icon']}\"></i><span> {$node['title']} </span>", $href);
            return $li . $a . "</li>";
        }
    }

}