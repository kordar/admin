<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = \Yii::t('yak', 'Reset Password');

/**
 * @var $model
 */

?>

<div class="card-body login-card-body">

    <p><?= \Yii::t('yak', 'Enter your details to begin:')?> </p>

    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]) ?>

    <fieldset>

        <?= $form->field($model, 'password', [
            'template' => '<div class="form-group has-feedback">{input}<span class="fa fa-lock form-control-feedback"></span>{error}</div>',
        ])->passwordInput(['placeholder' => \Yii::t('yak', 'Password')]) ?>

        <?= $form->field($model, 'repassword', [
            'template' => '<div class="form-group has-feedback">{input}<span class="fa fa-lock form-control-feedback"></span>{error}</div>',
        ])->passwordInput(['placeholder' => \Yii::t('yak', 'confirmPassword')]) ?>

        <div class="clearfix">

            <?= Html::submitButton(
                Html::tag('span', \Yii::t('yak', 'Submit'), ['class'=>'bigger-110']) . "\n" .
                Html::tag('i', '', ['class'=>'fa fa-arrow-up icon-on-right']),
                ['class' => 'width-35 pull-right btn btn-sm btn-success','name' => 'login-button'])
            ?>

        </div>
    </fieldset>

    <?php ActiveForm::end(); ?>

    <div class="toolbar center">

        <?= Html::a(
            \Yii::t('yak', 'Back to login') . "\n<i class=\"ace-icon fa fa-arrow-right\"></i>",
            ['login'],
            ['class'=>'back-to-login-link']
        ) ?>

    </div>

</div>