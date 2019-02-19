<?php
/* @var $this \yii\web\View */
/* @var $content string */

use kordar\yak\assets\ace\AppAsset;
use yii\helpers\Html;
use kordar\yak\helpers\SidebarHelper;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\YakConfigHelper;

$assetObj = AppAsset::register($this);

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

    <?= \kordar\yak\widgets\navbar\Navbar::widget();?>

    <div class="main-container ace-save-state" id="main-container">

        <script type="text/javascript">
            try{ace.settings.loadState('main-container')}catch(e){}
        </script>

        <?= \kordar\yak\widgets\sidebar\Sidebar::widget([
             'link'=> ArrayHelper::getValue($this->params, 'link', SidebarHelper::linker()),
             'tree'=> SidebarHelper::getTree()
         ]);
        ?>

        <div class="main-content">

            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">

                    <?= \kordar\yak\widgets\Breadcrumbs::widget([
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
                            <div class="space-4"></div>
                            <?= \kordar\yak\widgets\alert\Alert::widget() ?><!-- /.breadcrumb -->

                            <?= \kordar\yak\widgets\header\Header::widget(['info' => [
                                'title' => $this->title, 'small' => ArrayHelper::getValue($this->params, 'small-title', '')
                            ]]) ?>

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
                                    <?= YakConfigHelper::config('yak.site.company', '@company')?>
                                </span>
                                 |
                                <?= YakConfigHelper::config('yak.site.title', '@title')?> &copy; 2013-<?= date('Y')?>
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