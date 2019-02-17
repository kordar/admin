<?php
namespace kordar\yak\widgets\sidebar;

use yii\helpers\Html;

class LteTree extends \RecursiveIteratorIterator
{
    public $sideBarHtml = '';

    public $linker = '';

    public function beginIteration()
    {
        $this->sideBarHtml .= "<ul class=\"sidebar-menu\">\n";
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