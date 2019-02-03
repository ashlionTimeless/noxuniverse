<?php

namespace core\entities;

use core\forms\MessageForm;
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
class Message extends \yii\db\ActiveRecord
{

    public static function create(MessageForm $form)
    {
        $new = new static();
        $new->setAttributes($form->getAttributes());
        return $new;
    }

    public function edit(MessageForm $form)
    {
        $this->setAttributes($form->getAttributes());
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nox_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules= new MessageForm();
        return $rules->rules();
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
