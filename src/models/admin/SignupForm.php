<?php
namespace kordar\yak\models\admin;

use yii\base\Model;
use Yii;

/**
 * Signup Form
 */
class SignupForm extends Model
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'name'], 'trim'],
            [['username', 'email', 'password', 'confirmPassword'], 'required'],
            [['username', 'email', 'name'], 'string', 'min' => 2, 'max' => 255],
            [['password', 'confirmPassword'], 'string', 'min' => 6],
            ['email', 'email'],
            ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'message'=> Yii::t('yak', 'The password is inconsistent twice')],

            ['username', 'unique', 'targetClass' => User::className(), 'message' => Yii::t('yak', 'This user is already in use')],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => Yii::t('yak', 'This email is already registered')],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('yak', 'Name'),
            'username' => Yii::t('yak', 'Username'),
            'email' => Yii::t('yak', 'Email'),
            'password' => Yii::t('yak', 'Password'),
            'confirmPassword' => Yii::t('yak', 'Confirm Password')
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
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
