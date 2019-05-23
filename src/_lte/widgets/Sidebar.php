<?php
namespace kordar\yak\_lte\widgets;

use kordar\yak\libs\tree\MenuIterator;
use kordar\yak\models\admin\User;
use yii\helpers\Html;

class Sidebar extends \kordar\yak\widgets\YakWidget
{
    public function beforeRender()
    {
        $defaultAvatar = $this->config['default-avatar'];

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

    public function render()
    {
        // TODO: Implement render() method.
        $sideBarTree = new LteTree(new MenuIterator($this->widget->tree), \RecursiveIteratorIterator::SELF_FIRST);

        $sideBarTree->linker = $this->widget->link;

        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }

        $this->widget->view->registerJs('$(\'.sidebar li.active\').parents(\'li\').addClass(\'active open menu-open\');$(\'.sidebar li.active\').parent(\'ul\').addClass(\'open menu-open\')');

        // return $sideBarTree->sideBarHtml;

        return $this->beforeRender() . $sideBarTree->sideBarHtml . $this->afterRender();
    }

    public function afterRender()
    {
        return '</section>';
    }

}