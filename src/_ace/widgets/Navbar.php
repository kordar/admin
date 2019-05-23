<?php
namespace kordar\yak\_ace\widgets;

use kordar\yak\models\admin\User;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\YakConfigHelper;

class Navbar extends \kordar\yak\widgets\YakWidget
{
    public function beforeRender()
    {
        return '<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span><span class="icon-bar"></span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
				</button>';
    }

    public function afterRender()
    {
        return '</div></div>';
    }

    public function render()
    {
        // TODO: Implement render() method.
        return $this->beforeRender() . strtr('{title}<div class="navbar-buttons navbar-header pull-right" role="navigation"><ul class="nav ace-nav">{bars}{personal}</ul></div>', [
            '{title}' => $this->title(), '{bars}' => $this->bars(), '{personal}' => $this->personal()
        ]) . $this->afterRender();
    }

    protected function title()
    {
        // TODO: Implement title() method.
        $title = YakConfigHelper::config('yak.site.title', 'Ace Admin');
        return Html::tag('div', Html::a('<small>' . $this->config['logo'] . ' ' . $title . '</small>', \Yii::$app->homeUrl, ['class' => 'navbar-brand']), ['class' => 'navbar-header pull-left']);
    }

    /**
     * @return string
     * $items = [
     *      ['label' => '', 'href' => '', 'icon' => '', 'divider' => true],
     *      ......
     * ]
     */
    protected function personal()
    {
        // TODO: Implement personal() method.
        $defaultAvatar = YakConfigHelper::config('yak.default-avatar', '#');
        $defaultLogout = YakConfigHelper::config('yak.default-logout', ['/yak/auth/logout']);

        /**
         * @var $user User
         */
        $user = \Yii::$app->user->identity;

        $a = Html::a(Html::img($user->getAvatar($defaultAvatar), ['class' => 'nav-user-photo']) . '<span class="user-info"><small>Welcome,</small>' . $user->getName() . '</span>
								<i class="ace-icon fa fa-caret-down"></i>', '#', ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
        $items = ArrayHelper::getValue($this->config, 'personal', []);

        $items[] = ['label' => '注销', 'icon' => 'fa-power-off', 'href' => $defaultLogout, 'option' =>  [
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
                    Html::a('<i class="ace-icon fa ' . $icon . '"></i> ' . $label, $href, $option)
                );
        },'class' => 'user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close']);
        return Html::tag('li', $a . $ul, ['class' => 'light-blue dropdown-modal']);
    }

    public function bars()
    {
        return '';
        // TODO: Implement bars() method.
        return '
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex\'s Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan\'s Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob\'s Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate\'s Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred\'s Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
';
    }
}