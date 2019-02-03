<?php

namespace core\forms\User;

use core\entities\User\User;
use core\helpers\UserHelper;
use core\validators\PhoneValidator;
use core\forms\CompositeForm;
use core\forms\PhotosForm;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bnz_users".
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
class UserForm extends CompositeForm
    {
    public $username;
    public $fullname;
    public $password;
    public $email;
    public $phone;
    public $wallet;
    public $avatar_id;
    public $status;
    public $_user;

    public function __construct(User $user=null,array $config = [])
    {

        if($user)
        {
            $this->username=$user->username;
            $this->fullname=$user->fullname;
            $this->email=$user->email;
            $this->phone=$user->phone;
            $this->avatar_id=$user->avatar_id;
            $this->wallet=$user->wallet;
            $this->_user=$user;
        }
        $this->status=User::STATUS_ACTIVE;
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
            [['username', 'fullname','email', 'phone'], 'required'],
            [['wallet'], 'integer'],
            [['fullname','username', 'email', 'password', 'phone'], 'string', 'max' => 255],
            [['avatar_id'], 'string', 'max' => 500],
            ['phone',PhoneValidator::class,'message'=>"Wrong phone number format"],
            [['username','email'], 'unique','targetClass'=>User::class, 'filter' => ['<>', 'id', isset($this->_user)?$this->_user->id:null]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_confirm_token' => 'Email Confirm Token',
            'avatar_id' => 'avatar_id',
            'wallet' => 'WalletForm',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'phone' => 'Phone',
            'status' => 'Status',
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
