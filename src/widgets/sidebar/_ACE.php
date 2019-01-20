<?php
namespace kordar\yak\widgets\sidebar;

use kordar\yak\libs\tree\MenuIterator;

class _ACE extends AbstractSidebar
{
    public function render(\yii\web\View $view, $tree, $link)
    {
        // TODO: Implement render() method.
        $sideBarTree = new AceTree(new MenuIterator($tree), \RecursiveIteratorIterator::SELF_FIRST);

        $sideBarTree->linker = $link;

        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }

        $view->registerJs('$(\'#sidebar li.active\').parents(\'li\').addClass(\'active open\')');

        return $sideBarTree->sideBarHtml;
    }

    public function beforeRender()
    {
        return '<div id="sidebar" class="sidebar responsive ace-save-state">
                <script type="text/javascript">try{ace.settings.loadState(\'sidebar\')}catch(e){}</script>
          
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
                        <button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
                        <button class="btn btn-warning"><i class="ace-icon fa fa-users"></i></button>
                        <button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
                    </div>
            
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>
                        <span class="btn btn-info"></span>
                        <span class="btn btn-warning"></span>
                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->';
    }

    public function afterRender()
    {
        return ' <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div></div>';
    }
}