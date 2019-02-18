<?php
namespace kordar\yak\widgets\navbar;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class _LTE extends AbstractNavbar
{
    public function beforeRender()
    {
        $title = ArrayHelper::getValue(\Yii::$app->params['yak']['basic'], 'title', 'Admin LTE');
        return Html::a(
            '<span class="logo-mini">' . mb_substr($title, 0, 3) . '</span><span class="logo-lg"><b>' . $title . '</b></span>',
            \Yii::$app->homeUrl, ['class' => 'logo']
        );
    }

    protected function renderToggle()
    {
        return '<!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>';
    }

    protected function bars()
    {
        return '';

        return '<!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->';
    }

    protected function personal()
    {
        $defaultAvatar = ArrayHelper::getValue(\Yii::$app->params['yak'], 'default-avatar', '#');

        $a = Html::a(Html::img($this->user->getAvatar($defaultAvatar), ['class' => 'user-image']) . '<span class="hidden-xs">' . $this->user->getName() . '</span>', '#', ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
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
            $divider = ArrayHelper::getValue($item, 'divider', false);
            $option = ArrayHelper::getValue($item, 'option', []);

            return ($divider == true ? '<li class="divider"></li>': '') . Html::tag('li',
                    Html::a('<i class="fa ' . $icon . '"></i> ' . $label, $href, $option)
                );
        }, 'class' => 'dropdown-menu']);

        return Html::tag('li', $a . $ul, ['class' => 'dropdown user user-menu']);
    }

    public function render(\yii\web\View $view)
    {
        return strtr('<nav class="navbar navbar-static-top">{toggle}<div class="navbar-custom-menu">
                <ul class="nav navbar-nav">{bars}{personal}</ul></div></nav>', [
            '{toggle}' => $this->renderToggle(), '{bars}' => $this->bars(), '{personal}' => $this->personal()
        ]);
    }
}
