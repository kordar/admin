<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kordar\yak\helpers\YakHelper;
use kordar\yak\helpers\RbacHelper;


/* @var $this yii\web\View */
/* @var $model \kordar\yak\models\rbac\AuthItem */

/**
 * @var $roles
 * @var $permissions
 * @var $userId
 */

$this->title = Yii::t('yak', 'Admin Assign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yak', 'Admins'), 'url' => ['index'], 'icon' => 'fa-list'];
$this->params['breadcrumbs'][] = $this->title;

$this->params['small-title'] = Html::tag('b', '[' . $name . '] ') . Yii::t('yak', 'Assign');

$this->params['link'] = 'yak/admin/index';
?>

<div class="box">


    <div class="box-header">
        <h4 class="text-warning">管理员名称：<?= $name?></h4>
    </div>

    <div class="box-body">

        <?php $form = ActiveForm::begin(); ?>

        <div class="well well-checkbox">
            <h4 class="green smaller lighter"><?= Yii::t('yak', 'Assign Roles')?></h4>

            <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
                    'name' => 'roles', 'items' => RbacHelper::roles(), 'selected' => RbacHelper::rolesByUser($userId)
            ])?>

        </div>

        <div class="well well-checkbox">
            <h4 class="orange smaller lighter"><?= Yii::t('yak', 'Assign Permissions')?></h4>

            <?php foreach (RbacHelper::permissionsToGroup() as $permission):?>

                <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
                        'name' => 'permissions', 'items' => $permission, 'selected' => RbacHelper::permissionsByUser($userId)
                ])?>

                <hr>
            <?php endforeach;?>

        </div>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save bigger-110"></i> ' . Yii::t('yak', 'Submit'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>