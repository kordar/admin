<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = \Yii::t('yak', 'Retrieve The Password');

/**
 * @var $model
 */
?>

<div class="card-body login-card-body">
    <h4 class="header red lighter bigger">
        <i class="ace-icon fa fa-key"></i>
        <?= $this->title; ?>
    </h4>

    <?= \kordar\yak\widgets\alert\Alert::widget() ?>

    <div class="space-6"></div>
    <p>
        <?= \Yii::t('yak', 'Enter your email and receive instructions')?>
    </p>

    <?php $form = ActiveForm::begin([
        'action'=>['request-password-reset'],
        'method'=>'post',
    ]) ?>

    <fieldset>

        <?= $form->field($model, 'email', [
            'template' => '<div class="form-group has-feedback">{input}<span class="fa fa-envelope form-control-feedback"></span>{error}</div>',
        ])->textInput(['type' => 'email', 'placeholder'=>'Email']) ?>

        <div class="clearfix">

            <?= Html::submitButton(
                '<i class="ace-icon fa fa-send-o"></i>
                            <span class="bigger-110">' . \Yii::t('yak', 'Send Me') . '</span>',
                ['class' => 'width-35 pull-right btn btn-sm btn-danger'])
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
