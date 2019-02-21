<?php
namespace kordar\yak\widgets\sidebar;

use kordar\yak\helpers\YakConfigHelper;
use kordar\yak\libs\tree\MenuIterator;
use kordar\yak\models\admin\User;
use yii\helpers\Html;

class _LTE3 extends AbstractSidebar
{
    public function beforeRender()
    {
        $src = YakConfigHelper::config('yak.site.logo', '#');

        $logo = Html::img($src, ['alt' => 'logo', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']);
        $title = YakConfigHelper::config('yak.title', 'Admin LTE3');
        return Html::a("{$logo}<span class=\"brand-text font-weight-light\">{$title}</span>", \Yii::$app->homeUrl, ['class' => 'brand-link bg-white']);
    }

    protected function renderPersonal()
    {
        $defaultAvatar = YakConfigHelper::config('yak.default-avatar', '#');

        return strtr('<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">{image}</div> <div class="info"><a href="#" class="d-block">{name}</a></div></div>',
            ['{name}' => $identity = \Yii::$app->user->identity->getName(), '{image}' => Html::img($defaultAvatar, ['class' => 'img-circle elevation-2', 'alt' => 'User Image'])]);
    }

    public function render(\yii\web\View $view, $tree, $link)
    {
        // TODO: Implement render() method.
        $sideBarTree = new Lte3Tree(new MenuIterator($tree), \RecursiveIteratorIterator::SELF_FIRST);

        $sideBarTree->linker = $link;

        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }

        $view->registerJs('$(\'.nav-sidebar a.active\').parents(\'li\').addClass(\'menu-open\');');

        return strtr('<div class="sidebar">{personal} {sidebar}</div>', ['{personal}' => $this->renderPersonal(), '{sidebar}' => $sideBarTree->sideBarHtml]);
    }
}