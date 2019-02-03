<?php

namespace core\forms;

use Yii;
use core\entities\Event;
/**
 * This is the model class for table "nox_events".
 *
 * @property int $id
 * @property string $date_start
 * @property string $date_end
 * @property string $name_en
 * @property string $description_ua
 * @property string $name_ua
 * @property string $description_en
 */
class EventForm extends CompositeForm
{

    public $date_start;
    public $date_end;
    public $name_en;
    public $description_ua;
    public $name_ua;
    public $description_en;

    public function __construct(Event $entity=null)
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
            [['date_start', 'date_end', 'name_en', 'description_ua', 'name_ua', 'description_en'], 'required'],
            [['date_start', 'date_end'], 'safe'],
            [['description_ua', 'description_en'], 'string'],
            [['name_en', 'name_ua'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'name_en' => 'Name En',
            'description_ua' => 'Description Ua',
            'name_ua' => 'Name Ua',
            'description_en' => 'Description En',
        ];
    }


}
