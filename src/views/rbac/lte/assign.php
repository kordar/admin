<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kordar\yak\helpers\YakHelper;
use kordar\yak\helpers\RbacHelper;

/* @var $this yii\web\View */
/* @var $model kordar\yak\models\rbac\AuthItem */

/**
 * @var $roles
 * @var $permissions
 */

$this->title = Yii::t('yak', 'Assign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Roles'), 'url' => ['roles'], 'icon'=>'fa-group'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['link'] = 'yak/rbac/roles';
?>
<div class="role-create">

    <?= \kordar\yak\widgets\header\Header::widget(['info' => [
        'title' => Html::encode($this->title),
        'small' => Html::tag('b', '[' . $name . '] ') . Yii::t('yak', 'Assign')
    ]]) ?>

    <div class="role-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="well well-checkbox">
            <h4 class="green smaller lighter"><?= Yii::t('yak', 'Assign Roles')?></h4>

            <?= Html::checkboxList('roles', RbacHelper::rolesChild($name), RbacHelper::roles($name), YakHelper::checkboxListOptions());?>

        </div>

        <div class="well well-checkbox">
            <h4 class="orange smaller lighter"><?= Yii::t('yak', 'Assign Permissions')?></h4>

            <?php foreach (RbacHelper::permissionsToGroup() as $permission):?>
                <?= Html::checkboxList('permissions', RbacHelper::permissionsByRole($name), $permission, YakHelper::checkboxListOptions());?>
                <hr>
            <?php endforeach;?>

        </div>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('yak', 'Submit'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>