<?php
namespace kordar\yak\widgets\sidebar;

use kordar\yak\helpers\YakConfigHelper;
use kordar\yak\libs\tree\MenuIterator;
use kordar\yak\models\admin\User;
use yii\helpers\Html;

class _LTE extends AbstractSidebar
{
    public function beforeRender()
    {
        $defaultAvatar = YakConfigHelper::config('yak.default-avatar', '#');

        /**
         * @var $identity User
         */
        $identity = \Yii::$app->user->identity;
        $avatar = Html::img($identity->getAvatar($defaultAvatar), ['class' => 'img-circle']);
        $name = $identity->getName();

        return strtr('<section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">{avatar}</div>
                <div class="pull-left info"><p>{name}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {online}</a></div>
            </div>', ['{avatar}' => $avatar, '{name}' => $name, '{online}' => \Yii::t('yak', 'Online')]);
    }

    public function render(\yii\web\View $view, $tree, $link)
    {
        // TODO: Implement render() method.
        $sideBarTree = new LteTree(new MenuIterator($tree), \RecursiveIteratorIterator::SELF_FIRST);

        $sideBarTree->linker = $link;

        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }

        $view->registerJs('$(\'.sidebar li.active\').parents(\'li\').addClass(\'active open\');$(\'.sidebar li.active\').parent(\'ul\').addClass(\'menu-open\')');

        return $sideBarTree->sideBarHtml;
    }

    public function afterRender()
    {
        return '</section>';
    }
}