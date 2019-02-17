<?php
namespace kordar\yak\models\auth;

use yii\base\Model;
use yii\base\InvalidParamException;
use kordar\yak\models\admin\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $repassword;

    /**
     * @var \kordar\yak\models\admin\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            $message = \Yii::t('yak', 'Password reset token cannot be blank.');
            throw new InvalidParamException($message);
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            $message = \Yii::t('yak', 'Wrong password reset token.');
            throw new InvalidParamException($message);
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'repassword'], 'required'],
            [['password', 'repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute'=>'password', 'message'=>\Yii::t('yak', 'The password is inconsistent twice')]
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => \Yii::t('yak', 'Password'),
            'repassword' => \Yii::t('yak', 'confirmPassword')
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
