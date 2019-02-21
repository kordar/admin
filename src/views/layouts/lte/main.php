<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\SidebarHelper;
use kordar\yak\helpers\YakConfigHelper;

\kordar\yak\assets\lte\AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class='hold-transition skin-blue sidebar-mini'>
<?php $this->beginBody() ?>
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <?= \kordar\yak\widgets\navbar\Navbar::widget() ?>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?= \kordar\yak\widgets\sidebar\Sidebar::widget([
            'link'=> ArrayHelper::getValue($this->params, 'link', SidebarHelper::linker()),
            'tree'=> SidebarHelper::getTree()
        ]) ?>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <?= \kordar\yak\widgets\header\Header::widget(['info' => [
                'title' => Html::encode($this->title), 'small' => ArrayHelper::getValue($this->params, 'small-title', '')
            ]]) ?>

            <?= \kordar\yak\widgets\Breadcrumbs::widget([
                'links' => ArrayHelper::getValue($this->params, 'breadcrumbs', []),
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <?= \kordar\yak\widgets\alert\Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">

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

        <strong>Copyright &copy; 2013-<?= date('Y')?> · <?= YakConfigHelper::config('yak.company', '@company')?> · </strong>
        <?= YakConfigHelper::config('yak.title', '@title')?>

    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
