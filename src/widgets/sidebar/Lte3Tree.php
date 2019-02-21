<?php
namespace kordar\yak\widgets\sidebar;

use yii\helpers\Html;

class Lte3Tree extends \RecursiveIteratorIterator
{
    public $sideBarHtml = '';

    public $linker = '';

    public function beginIteration()
    {
        $this->sideBarHtml .= "<ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\" data-accordion=\"false\">\n";
    }

    public function beginChildren()
    {
        $this->sideBarHtml .= "<ul class=\"nav nav-treeview\">\n";
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

        $active = $node['href'] == $this->linker ?  ' active' : '';

        if ($isChildren) {
            return strtr('<li class="nav-item has-treeview">{a}', ['{a}' => Html::a(
                "<i class=\"nav-icon fa {$node['icon']}\"></i><p>{$node['title']}<i class=\"right fa fa-angle-left\"></i></p>",
                $href, ['class' => 'nav-link' . $active])]);
        } else {
            return strtr('<li class="nav-item">{a}</li>', ['{a}' => Html::a(
                "<i class=\"nav-icon fa {$node['icon']}\"></i><p>{$node['title']}</p>",
                $href, ['class' => 'nav-link' . $active])]);
        }

    }

}