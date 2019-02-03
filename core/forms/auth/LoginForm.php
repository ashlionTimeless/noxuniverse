<?php
namespace core\forms\auth;

use yii\base\Model;
class LoginForm extends Model
{
    public $username;
    public $password;
    public $ga_key;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['username', 'password','ga_key'], 'required'],
            ['rememberMe', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=>'Username',
            'passowrd'=>'Password',
            'ga_key'=>'Current Google Authenticator Code'
        ];
    }
}
