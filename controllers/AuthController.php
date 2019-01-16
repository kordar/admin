<?php
namespace kordar\yak\controllers;

class AuthController extends YakController
{
    public function actionLogin()
    {
        return $this->render('login');
    }
}