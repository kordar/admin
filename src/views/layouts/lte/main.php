<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use kordar\yak\helpers\ConfigHelper;
use yii\helpers\ArrayHelper;
use kordar\yak\helpers\SidebarHelper;

\kordar\yak\assets\lte\AppAsset::register($this);

$config = ConfigHelper::config('auth-layout');

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
            <?= $content ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
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
