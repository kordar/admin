<?php
/* @var $this \yii\web\View */
/* @var $content string */

use kordar\ace\web\assets\AceAsset;
use yii\helpers\Html;
use kordar\yak\helpers\ConfigHelper;
use yii\helpers\ArrayHelper;

AceAsset::register($this);

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
    <body class='login-layout'>
    <?php $this->beginBody() ?>

    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red"><?= ArrayHelper::getValue($config, 'title', '@title')?></span>
                                <span class="white" id="id-text2"><?= ArrayHelper::getValue($config, 'sub-title', '@sub-title')?></span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; <?= ArrayHelper::getValue($config, 'company', '@company')?></h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <?= $content;?>
                        </div><!-- /.position-relative -->

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>