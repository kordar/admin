<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('yak', 'New User Registration');

/**
 * @var $model
 */
?>
<div id="signup-box" class="signup-box visible widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                <i class="ace-icon fa fa-users blue"></i>
                <?= $this->title?>
            </h4>

            <div class="space-6"></div>
            <p><?= Yii::t('yak', 'Enter your details to begin:')?> </p>

            <?php $form = ActiveForm::begin([
                'action'=>['signup'],
                'method'=>'post',
            ]) ?>

            <fieldset>

                <?= $form->field($model, 'email', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-envelope\"></i></span>{error}"
                ])->textInput(['placeholder' => Yii::t('yak', 'Email'), 'type'=>'email']) ?>

                <?= $form->field($model, 'username', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-user\"></i></span>{error}"
                ])->textInput(['placeholder' => Yii::t('yak', 'Username')]) ?>

                <?= $form->field($model, 'password', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-lock\"></i></span>{error}"
                ])->passwordInput(['placeholder' => Yii::t('yak', 'Password')]) ?>

                <?= $form->field($model, 'repassword', [
                    'template' => "<span class='block input-icon input-icon-right'>{input}<i class=\"ace-icon fa fa-lock\"></i></span>{error}"
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
                        ['class' => 'width-30 pull-left btn btn-sm', 'name' => 'login-button'])
                    ?>

                    <?= Html::submitButton(
                        Html::tag('span', Yii::t('yak', 'Register'), ['class'=>'bigger-110']) . "\n" .
                        Html::tag('i', '', ['class'=>'ace-icon fa fa-arrow-right icon-on-right']),
                        ['class' => 'width-65 pull-right btn btn-sm btn-success','name' => 'login-button'])
                    ?>

                </div>
            </fieldset>

            <?php ActiveForm::end(); ?>

        </div>

        <div class="toolbar center">

            <?= Html::a(
                "<i class=\"ace-icon fa fa-arrow-left\"></i>\n" . Yii::t('yak', 'Back to login'),
                ['auth/login'], ['class'=>'back-to-login-link']
            ) ?>

        </div>
    </div><!-- /.widget-body -->
</div><!-- /.signup-box -->
