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

$this->params['small-title'] = $name;

$this->params['link'] = 'yak/admin/index';
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= Yii::t('yak', 'Assign Roles')?></h3>
    </div>
    <div class="card-body">
        <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
            'name' => 'roles', 'items' => RbacHelper::roles(), 'selected' => RbacHelper::rolesByUser($userId)
        ])?>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= Yii::t('yak', 'Assign Permissions')?></h3>
    </div>
    <div class="card-body">
        <?php foreach (RbacHelper::permissionsToGroup() as $permission):?>

            <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
                'name' => 'permissions', 'items' => $permission, 'selected' => RbacHelper::permissionsByUser($userId)
            ])?>

        <?php endforeach;?>
    </div>
    <div class="card-footer">
        <?= Html::submitButton('<i class="fa fa-save bigger-110"></i> ' . Yii::t('yak', 'Submit'), ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>