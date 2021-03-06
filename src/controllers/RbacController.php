<?php

namespace kordar\yak\controllers;

use Yii;
use kordar\yak\models\rbac\AssignModel;
use kordar\yak\models\rbac\AuthItem;
use kordar\yak\models\rbac\AuthItemSearch;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/**
 * MenuController implements the CRUD actions for MenuView model.
 * @item *:Rbac权限管理
 */

class RbacController extends YakController
{
    protected $verbs = [
        'delete-permission' => ['POST'],
        'delete-role' => ['POST'],
    ];

    /**
     * @return string
     * @item permissions:权限节点列表
     */
    public function actionPermissions()
    {
        return $this->authItems(2, 'permission/index');
    }

    /**
     * @return string|\yii\web\Response
     * @item create-permission:创建权限节点
     */
    public function actionCreatePermission()
    {
        $model = new AuthItem();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            $permission = $auth->createPermission(null);
            $permission->name = $model->name;
            $permission->description = $model->description;
            $permission->ruleName = $model->rule_name;
            $permission->data = $model->data;
            if ($auth->add($permission)) {
                return $this->redirect(['permissions']);
            }
        }
        return $this->renderTpl('permission/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @item update-permission:更新权限节点
     */
    public function actionUpdatePermission($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            $permission = $auth->createPermission(null);
            $permission->name = $model->name;
            $permission->description = $model->description;
            $permission->ruleName = $model->rule_name;
            $permission->data = $model->data;
            if ($auth->update($model->name, $permission)) {
                return $this->redirect(['permissions']);
            }
        }

        return $this->renderTpl('permission/update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @item view-permission:查看权限节点
     */
    public function actionViewPermission($id)
    {
        return $this->authItemView($id, 'permission/view');
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @item delete-permission:删除权限节点
     */
    public function actionDeletePermission($id)
    {
        $auth = Yii::$app->authManager;
        $obj = $auth->getPermission($id);
        $auth->remove($obj);
        return $this->redirect(['permissions']);
    }

    /**
     * @return string
     * @item roles:角色列表
     */
    public function actionRoles()
    {
        return $this->authItems(1, 'role/index');
    }

    /**
     * @return string|\yii\web\Response
     * @throws \Exception
     * @item create-role:创建角色
     */
    public function actionCreateRole()
    {
        $model = new AuthItem();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            $role = $auth->createRole(null);
            $role->name = $model->name;
            $role->description = $model->description;
            $role->ruleName = $model->rule_name;
            $role->data = $model->data;
            if ($auth->add($role)) {
                return $this->redirect(['roles']);
            }
        }
        return $this->renderTpl('role/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @item update-role:更新角色
     */
    public function actionUpdateRole($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            $role = $auth->createRole(null);
            $role->name = $model->name;
            $role->description = $model->description;
            $role->ruleName = $model->rule_name;
            $role->data = $model->data;
            if ($auth->update($model->name, $role)) {
                return $this->redirect(['roles']);
            }
        }

        return $this->renderTpl('role/update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @item view-role:查看角色
     */
    public function actionViewRole($id)
    {
        return $this->authItemView($id, 'role/view');
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @item delete-role:删除角色
     */
    public function actionDeleteRole($id)
    {
        $auth = Yii::$app->authManager;
        $obj = $auth->getRole($id);
        $auth->remove($obj);
        return $this->redirect(['roles']);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function authItemView($id, $view)
    {
        return $this->renderTpl($view, [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $type
     * @param $view
     * @return string
     */
    protected function authItems($type, $view)
    {
        $searchModel = new AuthItemSearch();
        $searchModel->type = $type;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderTpl($view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @item assign:角色分配权限节点
     */
    public function actionAssign($id)
    {
        $model = new AssignModel();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post(), '') && $model->setChildrenToRole($id)) {
                Yii::$app->session->setFlash('success', Html::tag('b', '[' . $id . ']') . Yii::t('yak', 'Permission assignment is successful'));
                return $this->redirect(['roles']);
            }
            Yii::$app->session->setFlash('warning', Yii::t('yak', 'Permission assignment failed'));
        }

        return $this->renderTpl('assign', ['name' => $id]);
    }


    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
