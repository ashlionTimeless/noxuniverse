<?php

namespace core\forms\auth;

use core\entities\User\User;
use core\helpers\UserHelper;
use core\repositories\User\CountryRepository;
use core\validators\PhoneValidator;
use core\entities\User\Country;
use core\forms\CompositeForm;
use core\forms\User\PhotosForm;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_confirm_token
 * @property string $avatar_id
 * @property integer $wallet
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 * @property string $phone
 * @property integer $status
 */
//class UserForm extends Model
class SignupForm extends CompositeForm
{
    public $username;
    public $fullname;
    public $password;
    public $password_repeat;
    public $email;
    public $phone;
    public $avatar_id;
    public $status;
    public $_user;

    public function __construct(User $user=null,array $config = [])
    {
        $this->photos= new PhotosForm();
        return parent::__construct($config);
    }


    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'fullname','email', 'phone','password','password_repeat'], 'required'],
            [['fullname','username', 'email', 'password', 'phone'], 'string', 'max' => 255],
            [['avatar_id'], 'string', 'max' => 500],
            ['phone',PhoneValidator::class,'message'=>"Wrong phone number format"],
            [['username','email'], 'unique','targetClass'=>User::class, 'filter' => ['<>', 'id', isset($this->_user)?$this->_user->id:null]],
            [['password','password_repeat'],'string','min'=>6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Repeat Password',
            'avatar_id' => 'avatar_id',
            'wallet' => 'WalletForm',
            'phone' => 'Phone',
        ];
    }


    /**
     * @return array
     */
    public function internalForms()
    {
        return ['photos'];
    }

}
