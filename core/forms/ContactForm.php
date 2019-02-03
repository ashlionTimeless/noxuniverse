<?php

namespace core\forms;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $phone;
    public $location;
    public $social_media;
//    public $body;
//    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function __construct(array $config = [])
    {
        $this->subject="'Join Us' form has been submitted.";
        parent::__construct($config);
    }

    public function rules()
    {
//        return [
//            [['name', 'email', 'subject', 'body'], 'required'],
//            ['email', 'email'],
//            ['verifyCode', 'captcha'],
//        ];
        return [
            [['name', 'email', 'phone', 'location','social_media'], 'required'],
            ['email', 'email'],
            [['name', 'phone', 'location','social_media'],'string','max'=>255]
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'=>'Name',
            'email'=>'Email',
            'phone'=>'Phone',
            'location'=>'Location',
            'social_media'=>'Social Media'
//            'verifyCode' => 'Verification Code',
        ];
    }


}
