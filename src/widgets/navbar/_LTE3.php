<?php
namespace kordar\yak\widgets\navbar;

use kordar\yak\helpers\YakConfigHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class _LTE3 extends AbstractNavbar
{
    protected function renderToggle()
    {
        $menus = ArrayHelper::getValue($this->config, 'menus', []);

        array_unshift($menus, [
            'label' => '<i class="fa fa-bars"></i>', 'linkOptions' => ['data-widget' => 'pushmenu']
        ]);

        return Html::ul($menus, ['item' => function ($item, $index) {

            $label = ArrayHelper::getValue($item, 'label', '@item');
            $href = ArrayHelper::getValue($item, 'href', '#');
            $option = ArrayHelper::getValue($item, 'option', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

            Html::addCssClass($option, 'nav-item');
            Html::addCssClass($linkOptions, 'nav-link');

            return Html::tag('li', Html::a($label, $href, $linkOptions), $option);

        }, 'class' => 'navbar-nav']) . $this->renderSearch();
    }

    protected function renderSearch()
    {
        return '<form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form>';
    }

    protected function bars()
    {
        return '';

        return '<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>';
    }

    protected function personal()
    {
        $items = ArrayHelper::getValue($this->config, 'personal', []);

        $items[] = ['label' => '注销', 'icon' => 'fa-power-off', 'href' => ['/yak/auth/logout'], 'option' =>  [
            'data' => [
                'confirm' => '确定注销？', 'method' => 'post',
            ],
        ]];

        $ul = Html::ul($items, ['item' => function ($item, $index) {

            $icon = ArrayHelper::getValue($item, 'icon', 'fa-cog');
            $label = ArrayHelper::getValue($item, 'label', '@item');
            $href = ArrayHelper::getValue($item, 'href', '#');
            $option = ArrayHelper::getValue($item, 'option', []);
            Html::addCssClass($option, 'dropdown-item');

            return Html::a(Html::tag('i', '', ['class' => "fa {$icon} mr-2"]) . $label, $href, $option) . '<div class="dropdown-divider"></div>';
        }, 'class' => 'dropdown-menu dropdown-menu-lg dropdown-menu-right']);

        return '<li class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#"><i class="fa fa-user text-default"></i></a>' . $ul . '</li>';
    }

    public function render(\yii\web\View $view)
    {
        return strtr('<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">{toggle}
                <ul class="navbar-nav ml-auto">{bars}{personal}{control}</ul></nav>', [
            '{toggle}' => $this->renderToggle(), '{bars}' => $this->bars(), '{personal}' => $this->personal(), '{control}' => $this->renderControl()
        ]);
    }

    protected function renderControl()
    {
        return '<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>';
    }
}
