<?php
namespace kordar\yak\models\auth;

use kordar\yak\models\admin\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $agreement;

    const AGREEMENT_OK = 1;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'trim'],
            [['username', 'agreement', 'email', 'password', 'repassword'], 'required'],
            [['username', 'email'], 'string', 'min' => 2, 'max' => 255],
            ['agreement', 'in', 'range' => [self::AGREEMENT_OK]],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => \Yii::t('yak', 'This user is already in use')],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => \Yii::t('yak', 'This email is already registered')],
            [['password', 'repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute'=>'password', 'message'=>\Yii::t('yak', 'The password is inconsistent twice')]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('yak', 'Username'),
            'email' => \Yii::t('yak', 'Email'),
            'password' => \Yii::t('yak', 'Password'),
            'repassword' => \Yii::t('yak', 'confirmPassword'),
            'agreement' => \Yii::t('yak', 'User Agreement'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return $user|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
