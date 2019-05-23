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

$this->params['small-title'] = $name;

$this->params['link'] = 'yak/rbac/roles';
?>


<?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= Yii::t('yak', 'Assign Roles')?></h3>
        </div>
        <div class="box-body">
            <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
                'name' => 'roles', 'items' => RbacHelper::roles($name), 'selected' => RbacHelper::rolesChild($name)
            ])?>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= Yii::t('yak', 'Assign Permissions')?></h3>
        </div>
        <div class="box-body">
            <?php foreach (RbacHelper::permissionsToGroup() as $permission):?>
                <?= kordar\yak\widgets\checkbox\HtmlCheckbox::widget([
                    'name' => 'permissions', 'items' => $permission, 'selected' => RbacHelper::permissionsByRole($name)
                ])?>
            <?php endforeach;?>
        </div>

        <div class="box-footer">
            <?= Html::submitButton(Yii::t('yak', 'Submit'), ['class' => 'btn btn-success']) ?>
        </div>

    </div>

<?php ActiveForm::end(); ?>