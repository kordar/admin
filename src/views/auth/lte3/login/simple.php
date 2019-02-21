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
<div class="card-body login-card-body">

    <?= \kordar\yak\widgets\alert\Alert::widget() ?>

    <p class="login-box-msg"><?= Yii::t('yak', 'Please Enter Your Information')?></p>

    <?php $form = ActiveForm::begin(['action'=>['login'], 'method'=>'post']) ?>

    <fieldset>

        <?= $form->field($model, 'username', [
            'template' => "<div class=\"form-group has-feedback\">{input}<span class=\"fa fa-user form-control-feedback\"></span>{error}</div>"
        ])->textInput(['placeholder'=>Yii::t('yak', 'Username')]) ?>

        <?= $form->field($model, 'password', [
            'template' => "<div class=\"form-group has-feedback\">{input}<span class=\"fa fa-lock form-control-feedback\"></span>{error}</div>"
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

</div>




