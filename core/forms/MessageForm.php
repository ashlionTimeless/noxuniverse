<?php

namespace core\forms;

use core\entities\Message;
use Yii;

/**
 * This is the model class for table "nox_messages".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $location
 * @property string $social_media
 * @property string $message
 */
class MessageForm extends CompositeForm
{
    public $name;
    public $email;
    public $phone;
    public $location;
    public $social_media;
    public $message;

    public function __construct(Message $entity=null)
    {
        if($entity)
        {
            $this->setAttributes($entity->getAttributes());
        }
        $this->photos= new PhotosForm();
        parent::__construct();
    }
    public function internalForms()
    {
        return ['photos'];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['message'], 'string'],
            [['name', 'email', 'phone', 'location', 'social_media'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'location' => 'Location',
            'social_media' => 'Social Media',
            'message' => 'Message',
        ];
    }
}
