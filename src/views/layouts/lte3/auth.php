<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use kordar\yak\helpers\YakConfigHelper;

\kordar\yak\assets\lte\AuthAsset::register($this);

$js = <<<JS
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
JS;

$this->registerJs($js);

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
<body class='hold-transition login-page'>
<?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">
            <h1>
                <span class="red"><?= YakConfigHelper::config('yak.site.title', '@title')?></span>
                <span class="white" id="id-text2"><?= YakConfigHelper::config('yak.site.sub-title', '@sub-title')?></span>
            </h1>
            <h4 class="blue" id="id-company-text">&copy; <?= YakConfigHelper::config('yak.site.company', '@company')?></h4>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body"><?= $content ?></div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
