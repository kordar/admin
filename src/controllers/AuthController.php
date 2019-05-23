<?php
namespace kordar\yak\controllers;

use kordar\yak\models\auth\PasswordResetRequestForm;
use kordar\yak\models\auth\ResetPasswordForm;
use kordar\yak\helpers\YakHelper;
use kordar\yak\helpers\YakConfigHelper;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

/**
 * Class AuthController
 * layout is "login", error layout is "blank"
 * ACL and RBAC not included,
 * set errorAction to /yak/auth/error
 *
 * @package kordar\yak\controllers
 * @author Dehui Kong <572821520@qq.com>
 * @since 1.0
 * @item *:用户登录认证
 */
class AuthController extends YakController
{
    protected $verbs = [
        'layout' => ['POST']
    ];

    // rbac validation is not included
    protected $rbacExcept = ['login', 'signup', 'request-password-reset', 'reset-password', 'error'];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->layout = '@kordar/yak/_' . $this->template . '/layout/auth.php';
        \Yii::$app->errorHandler->errorAction = 'yak/auth/error';
    }

    /**
     * Login action.
     * @desc 登录
     * @return string|\yii\web\Response
     * @item login:登录
     *
     * $params = [
     *      'yak' =>
     *          [
     *              'auth' => [
     *                  'login-template' => 'login',
     *                  'login-bg' => ''
     *              ]
     *          ]
     * ]
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \kordar\yak\models\auth\SignInForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $render = YakConfigHelper::config('yak.auth.template', 'login/simple');
        return $this->renderTpl($render, [
            'model' => $model, 'bg' => YakConfigHelper::config('yak.auth.bg', '#')
        ]);
    }

    /**
     * Logout action.
     * @desc 注销
     * @return \yii\web\Response
     * @item logout:注销
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Signs user up.
     * @desc 注册
     * @return string|\yii\web\Response
     * @item signup:注册
     */
    public function actionSignup()
    {
        $model = new \kordar\yak\models\auth\SignUpForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (\Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->renderTpl('signup', [ 'model' => $model ]);
    }

    /**
     * Request Password Reset
     * @desc 请求密码重置
     * @return string
     * @item request-password-reset:申请密码重置
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                YakHelper::setFlash('success', \Yii::t('yak', 'Please check your email for further instructions.'));
            } else {
                YakHelper::setFlash('error', \Yii::t('yak', 'Sorry, we were unable to reset the password for the provided email.'));
            }
        }

        return $this->renderTpl('forgot', [
            'model' => $model
        ]);
    }

    /**
     * Reset Password
     * @desc 重置密码
     * @param $token
     * @return string|\yii\web\Response
     * @throws BadRequestHttpException
     * @item reset-password:重置密码
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            YakHelper::setFlash('success', \Yii::t('yak', 'The new password is already stored.'));
            return $this->goHome();
        }

        return $this->renderTpl('reset-password', [
            'model' => $model
        ]);
    }

    /**
     * @return string
     * @desc 登录异常
     * @item error:登录异常
     */
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->renderTpl('error',[
                'code' => $exception->getCode(), 'message' => $exception->getMessage(),
            ]);
        }
    }

}