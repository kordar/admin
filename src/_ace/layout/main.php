<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use kordar\yak\helpers\SidebarHelper;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\YakConfigHelper;

$assetObj = \kordar\yak\_ace\assets\AceAsset::register($this);

$customerAsset = YakConfigHelper::config('yak.customer.asset', '');
if ($customerAsset) $customerAsset::register($this);


$css = <<<CSS
        .btn {
            border-width: 4px;
    font-size: 13px;
    padding: 4px 9px;
    line-height: 1.38;
        }
.box-header {
    color: #444;
    display: block;
    padding-bottom: 8px;
    position: relative;
}

.search-group {
        margin-bottom: 5px;
    }
CSS;

$this->registerCss($css);


?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
	</head>

	<body class="no-skin">
    <?php $this->beginBody() ?>

    <?= \kordar\yak\widgets\layout\Navbar::widget(); ?>

	<div class="main-container ace-save-state" id="main-container">

		<script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {
            }
		</script>

        <?= \kordar\yak\widgets\layout\Sidebar::widget([
            'link' => ArrayHelper::getValue($this->params, 'link', ''), 'tree' => SidebarHelper::getTree()
        ]);
        ?>

		<div class="main-content">

			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">

                    <?= \kordar\yak\widgets\layout\Breadcrumbs::widget([
                        'links' => ArrayHelper::getValue($this->params, 'breadcrumbs', []),
                    ]) ?>

                    <?php if (isset($this->blocks['breadcrumbsAfter'])): ?>
                        <?= $this->blocks['breadcrumbsAfter'] ?>
                    <?php endif; ?>

				</div>

				<div class="page-content">

                    <?php // \kordar\ace\widgets\Setting::widget(); ?>

					<!-- /.page-header -->

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

                            <?= \kordar\yak\widgets\layout\Header::widget([
                                'title' => $this->title, 'subTitle' => ArrayHelper::getValue($this->params, 'small-title', '')
                            ]) ?>

                            <?= \kordar\yak\widgets\layout\Alert::widget() ?><!-- /.breadcrumb -->

                            <?= $content ?>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>


		</div><!-- /.main-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
                            <span class="bigger-120">
                                <span class="blue bolder">
                                    <?= YakConfigHelper::config('yak.site.company', '@company') ?>
                                </span>
                                 |
                                <?= YakConfigHelper::config('yak.site.title', '@title') ?> &copy; 2013-<?= date('Y') ?>
                            </span>

					&nbsp; &nbsp;
					<span class="action-buttons">
                                <a href="#">
                                    <i class="ace-icon fa fa-wechat light-blue bigger-125"></i>
                                </a>

                                <a href="#" data-tips="ASDFDAS">
                                    <i class="ace-icon fa fa-qq text-primary bigger-125"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-rss-square orange bigger-125"></i>
                                </a>
                            </span>
				</div>
			</div>
		</div>

	</div>

	<!-- inline scripts related to this page -->

    <?php $this->endBody() ?>

	</body>
	</html>
<?php $this->endPage() ?>