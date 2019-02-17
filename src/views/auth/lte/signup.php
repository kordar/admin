<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('yak', 'New User Registration');

/**
 * @var $model
 */
?>

<div>

    <p><?= Yii::t('yak', 'Enter your details to begin:')?> </p>

    <?php $form = ActiveForm::begin([
        'action'=>['signup'],
        'method'=>'post',
    ]) ?>

    <fieldset>

        <?= $form->field($model, 'email', [
            'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}</div>',
        ])->textInput(['placeholder' => Yii::t('yak', 'Email'), 'type'=>'email']) ?>

        <?= $form->field($model, 'username', [
            'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}</div>',
        ])->textInput(['placeholder' => Yii::t('yak', 'Username')]) ?>

        <?= $form->field($model, 'password', [
            'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}</div>',
        ])->passwordInput(['placeholder' => Yii::t('yak', 'Password')]) ?>

        <?= $form->field($model, 'repassword', [
            'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-log-in form-control-feedback"></span>{error}</div>',
        ])->passwordInput(['placeholder' => Yii::t('yak', 'confirmPassword')]) ?>

        <?= $form->field($model, 'agreement')->checkbox([
            'class'=>'ace',
            'template' => "<div class=\"block\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>",
            'label'=>Html::tag('span', ' ' . Yii::t('yak', 'I accept the') . Html::a(Yii::t('yak', 'User Agreement'), '#', ['target'=>'_blank']),
                ['class'=>'lbl'])]) ?>

        <div class="space-6"></div>

        <div class="clearfix">

            <?= Html::resetButton(
                Html::tag('i', '', ['class'=>'ace-icon fa fa-refresh']) . "\n" .
                Html::tag('span', Yii::t('yak', 'Reset'), ['class'=>'bigger-110']),
                ['class' => 'width-65 pull-left btn btn-sm btn-warning', 'name' => 'login-button'])
            ?>

            <?= Html::submitButton(
                Html::tag('span', Yii::t('yak', 'Register'), ['class'=>'bigger-110']) . "\n" .
                Html::tag('i', '', ['class'=>'ace-icon fa fa-sign-in icon-on-right']),
                ['class' => 'width-65 pull-right btn btn-sm btn-success','name' => 'login-button'])
            ?>

        </div>
    </fieldset>

    <?php ActiveForm::end(); ?>

    <div class="social-auth-links text-center">
        <hr>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-qq"></i> <?= \Yii::t('yak', 'Sign In Using QQ')?></a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-wechat"></i> <?= \Yii::t('yak', 'Sign In Using Wechat')?> </a>
    </div>
    <!-- /.social-auth-links -->

    <div class="pull-left">

        <?= Html::a(
            "<i class=\"ace-icon fa fa-arrow-left\"></i>\n" . Yii::t('yak', 'Back to login'),
            ['auth/login'], ['class'=>'back-to-login-link']
        ) ?>

    </div>

    <br>

</div>