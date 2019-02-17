<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('yak', 'User Login');

$css = <<<CSS
  body {
    background-image: url($bg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
  }
CSS;

$this->registerCss($css);

/**
 * @var $model
 */

?>

<div id="login-box" class="login-box visible widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header blue lighter bigger">
                <i class="ace-icon fa fa-coffee green"></i>
                <?= Yii::t('yak', 'Please Enter Your Information')?>
            </h4>

            <?= \kordar\yak\widgets\alert\Alert::widget() ?>

            <?php $form = ActiveForm::begin(['action'=>['login'], 'method'=>'post']) ?>

            <fieldset>

                <?= $form->field($model, 'username', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-user\"></i></span>{error}"
                ])->textInput(['placeholder'=>Yii::t('yak', 'Username')]) ?>

                <?= $form->field($model, 'password', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-lock\"></i></span>{error}"
                ])->passwordInput(['placeholder'=>Yii::t('yak', 'Password')]) ?>

                <div class="clearfix">

                    <label class="inline">
                        <?= Html::hiddenInput('LoginForm[rememberMe]', 0)?>
                        <?= Html::checkbox('LoginForm[rememberMe]', false, ['class'=>'ace'])?>
                        <span class="lbl"> <?= Yii::t('yak', 'Remember Me')?></span>
                    </label>

                    <?= Html::submitButton(
                        Html::tag('i', '', ['class'=>'ace-icon fa fa-key']) .
                        Html::tag('span', Yii::t('yak', 'Login'), ['class'=>'bigger-110']),
                        ['class' => 'width-35 pull-right btn btn-sm btn-primary'])
                    ?>

                </div>

                <div class="space-4"></div>
            </fieldset>

            <?php ActiveForm::end(); ?>

            <div class="social-or-login center">
                <span class="bigger-110"><?= Yii::t('yak', 'Or Login Using')?></span>
            </div>

            <div class="space-6"></div>

            <div class="social-login center">
                <a class="btn btn-danger">
                    <i class="ace-icon fa fa-qq"></i>
                </a>

                <a class="btn btn-success">
                    <i class="ace-icon fa fa-wechat"></i>
                </a>

            </div>
        </div><!-- /.widget-main -->

        <div class="toolbar clearfix">
            <div>
                <?= Html::a(
                    "<i class=\"ace-icon fa fa-arrow-left\"></i>\n" . Yii::t('yak', 'I forgot my password'),
                    ['auth/request-password-reset'],
                    ['class'=>'forgot-password-link']
                ) ?>
            </div>

            <div>
                <?= Html::a(
                    Yii::t('yak', 'I want to register') . "\n<i class=\"ace-icon fa fa-arrow-right\"></i>",
                    ['auth/signup'],
                    ['class'=>'user-signup-link']
                ) ?>
            </div>
        </div>
    </div><!-- /.widget-body -->
</div><!-- /.login-box -->