<?php

namespace kordar\yak\controllers;

/**
 * Class DefaultController
 * @package kordar\ace\controllers
 * @item *:网站管理
 */
class DefaultController extends YakController
{
    protected $rbacExcept = ['error'];

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => 'error'
            ]
        ];
    }

    /**
     * Error Page
     * @item error:异常页面
     */
    // public function actionError() {}

}
